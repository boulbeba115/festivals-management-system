<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Festivale;
use App\Models\Artist;
use App\Models\Sponseur;
use App\Models\Soire;
use App\Models\SoireTicket;
use App\Models\Reservation;
use App\Models\QrCode;
use Carbon\Carbon;
use FarhanWazir\GoogleMaps\GMaps;
use Illuminate\Support\Facades\Auth;
use App\User;


use DB;
class IndexController extends Controller
{
    public function index()
    {
        $nbres=0;
        $fest =Festivale::where('selectedFes', '1')->first();
        foreach($fest->soires as $soi)
        {
            $nbres=$nbres+count($soi->reservations);
        }
        if($fest!=null)
        {
        if(count($fest->poinventes)>0)
        {
        $point=$fest->poinventes->first();
                $config['center'] = ''.$point->pvMapx.','.$point->pvMapy.'';}
                $config['zoom'] = '14';
                $config['map_height'] = '100%';
                $config['styles'] = array(

                    array("name"=>"Black Roads", "definition"=>array(
                    array("featureType"=>"all", "elementType"=>"labels.text.fill", "stylers"=>array(array("color"=>"gray"))),
                    array("featureType"=>"all", "elementType"=>"labels.text.stroke", "stylers"=>array(array( "visibility"=> "on","color"=> "#424b5b","weight"=> 2,"gamma"=> "1"))),
                    array("featureType"=>"all", "elementType"=>"labels.icon", "stylers"=>array(array( "visibility"=> "off"))),
                    array("featureType"=>"administrative", "elementType"=>"geometry", "stylers"=>array(array( "weight"=> 0.6,"color"=> "#545b6b","gamma"=> "0"))),
                    array("featureType"=>"landscape", "elementType"=>"geometry", "stylers"=>array(array( "weight"=>10,"color"=> "#1c223a","gamma"=> "1"))),
                    array("featureType"=>"poi", "elementType"=>"geometry", "stylers"=>array(array("color"=> "#666c7b"))),
                    array("featureType"=>"poi.park", "elementType"=>"geometry", "stylers"=>array(array("color"=> "#545b6b"))),
                    array("featureType"=>"road", "elementType"=>"geometry", "stylers"=>array(array("color"=> "#424a5b","lightness"=> "0"))),
                    array("featureType"=>"transit", "elementType"=>"geometry", "stylers"=>array(array("color"=> "#666c7b"))),
                    array("featureType"=>"water", "elementType"=>"geometry", "stylers"=>array(array("color"=> "#2e3546")))                                                      
                                                     
                    ))
                  );
                  $config['stylesAsMapTypes'] = true;
                  $config['stylesAsMapTypesDefault'] = "Black Roads"; 
                  $gmapconfig['geocodeCaching'] = true;

                $gmap = new GMaps();
                $gmap->initialize($config);
            foreach ($fest->poinventes as $poinvente) 
            {
                $marker['position'] = ''.$poinvente->pvMapx.','.$poinvente->pvMapy.'';
                $marker['infowindow_content'] = ''.$poinvente->nomPv.','.$poinvente->adrPv.'' ;
                $gmap->add_marker($marker);
            }
                $map = $gmap->create_map();
            return view('index')->with(compact('fest','map','nbres'));
        }
        else
        return "pas de donnais disponible";
     }

     function fetch(Request $request)
     {
      $ch="";
      $style=array('ticket-color-1','ticket-color-2','ticket-color-3');$i=0;
      $select = $request->get('select');
      $value = $request->get('value');
      $dependent = $request->get('dependent');
     /* $data=Soire::where('idSoi',$value)->get();*/
      $data = Soire::find($value);
      if(count($data)!=0)
      {
      foreach($data->tickets as $row)
      {
      /* $output .= '<option value="'.$row->$dependent.'">'.$row->prixTic.'</option>';*/
    {
    if($row->pivot->nbTicDes!=0)
    {
    $ch.= '
        <div>
        <input type="radio" id="control_0'.$i.'" name="SelectedTic" value="'.$row->idTic.'">
        <label for="control_0'.$i.'">
        <div class="ticket  ticket-wrapper" id="ticket-item-wrapper">
      <div class="ticket-item is-visible " data-type="tickets">
         <h3 class="ticket-title '.$style[$i].'">'.$row->typeTic.'</h3>
         <p class="ticket-details">'.$row->desTic.'</p>
         <div class="ticket-amount">'.$row->pivot->prixTic.'<span class="ticket-currency"> /dt</span><span class="ticket-period"></span>
         </div>
         <ul class="ticket-feature-details">
            <li class="ticket-feature">'.$row->pivot->nbTicDes.' Disponible</li>
        </ul>
        </div>
     </div>
        </label>
        </div>';
    }
    else
    {
        $ch.=
       '<div>
        <input type="radio" id="control_0'.$i.'" disabled name="SelectedTic" value="'.$row->idTic.'" >
        <label for="control_0'.$i.'">
        <div class="ticket  ticket-wrapper" id="ticket-item-wrapper">
        <div class="ticket-item is-visible " data-type="tickets" >
           <h3 class="ticket-title ticket-color-1">'.$row->typeTic.'</h3>
           <p class="ticket-details">'.$row->desTic.'</p>
           <div class="ticket-amount">'.$row->pivot->prixTic.'<span class="ticket-currency"> /dt</span><span class="ticket-period"></span>
           </div>
           <ul class="ticket-feature-details">
              <li class="ticket-feature">Pas de Ticket Disponible</li>
           </ul>
          </div>
       </div>
        </label>
        </div>';
        }
        $i++;
        }
       }
      }
      else
      {
      $ch = '<h2>pas de ticket disponible</h2>';
      }
      $output=$ch;
      echo $output;
     }

     function reserver(Request $request)
     {
        $this->validate($request, [
            'soire' => 'required',
            'SelectedTic' => 'required',
            'cc-number' =>'required',
            'cc-exp' =>'required',
            'cc-cvc' =>'required',
            'nbplacedis' =>'required|max:10',
        ],
        [
            'soire.required' =>'le champ soirée est obligatoire',
            'SelectedTic.required' =>'le champ Ticket est obligatoire',
            'cc-number.required' =>'le champ numero de carte  est obligatoire',
            'cc-exp.required' =>"le date d'expiration et un champ obligatoire",
            'cc-cvc.required' =>'le champ cvc est obligatoire',
            'nbplacedis.required' =>'le champ nombre place disponible est obligatoire',
            'nbplacedis.max' =>'le nombre maximale de réservation et 10'
        ]
    );
    $nbressoitotale=0;
    $tic=$request->input('SelectedTic');
    $soi=$request->input('soire');
    $soitic=SoireTicket::where([['soire_idSoi',$soi],['ticket_idTic',$tic]])->first();
    $nbrest=$soitic->nbTicDes-$request->input('nbplacedis');
    if($request->input('nbplacedis')>10)
    {
        $err="Le Maximum  nombre de reservation est 10 pour cette Soiré";
        return view('erreur.erreurpage')->with('err',$err);
    }
    if($nbrest<0)
    {
        $err="le nombre de place a Réservé et plus grand que le nombre de ticket disponible";
        return view('erreur.erreurpage')->with('err',$err);
    }
    $tousres=Auth::user()->reservations;
    foreach( $tousres as $thisres)
    {
        if($thisres->soire_idSoi==$soi)
        {
           $nbressoitotale=$nbressoitotale+$thisres->nbRes;
        }

    }
    if( $nbressoitotale+$request->input('nbplacedis')>10)
    {
    $err="Pour chaque soiré tu peut réservé seulement 10 place";
    return view('erreur.erreurpage')->with('err',$err); 
    }
    $soitic->nbTicDes= $nbrest;
    $soitic->save();
    $reservation = new Reservation;
    $qc = new QRCODE();   
    $token=$this->generateRandomString(15,Auth::user()->cin,$tic,$soi);
    $qc->TEXT($token);         
    $url="storage/qrcode/".Auth::user()->cin."_".time().".png";
    $reservation->soire_idSoi= $request->input('soire');
    $reservation->user_id= Auth::id();
    $reservation->offreTic= $request->input('SelectedTic');
    $reservation->nbRes= $request->input('nbplacedis');
    $reservation->qrcode=$url;
    $reservation->codeRes= $token;
    $reservation->save();
    $qc->QRCODE(200,$url);
    return redirect('/user');
     }

 
     function ind()
     {   
     $lesres=Auth::user()->reservations;

     return view('userdash')->with(compact('lesres'));
    
    }

     function donnaisreservation($id)
     {
        $reserv=Reservation::find($id);
        return  $reserv ;
     }
 
     function pdf($id)
     {
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($this->data_to_html($id));
      return $pdf->stream('reservation_'.$id.'.pdf');
     }
 
     function data_to_html($id)
     {
      $reservaion = $this->donnaisreservation($id);
     $typeTic;$prixTic;
      foreach($reservaion->soire->tickets as $tic)
      {
        if($tic->pivot->ticket_idTic==$reservaion->offreTic)
        {
            $typeTic=$tic->typeTic;
            $prixTic=$tic->pivot->prixTic;
        }
      }
      /*if($reservaion->Soire)*/
      $output = '
      <!doctype html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <title>Reserv - #'.$reservaion->idRes.'</title>
          <style type="text/css">
              @page {
                  margin: 0px;
              }
              * {
                  font-family: Verdana, Arial, sans-serif;
              }
              a {
                  color: #fff;
                  text-decoration: none;
              }
              table {
                  font-size: x-small;
              }
              tfoot tr td {
                  font-weight: bold;
                  font-size: x-small;
              }
              .datatab{
                  margin-left: 40px;
              }
              .invoice h3 {
                  margin-left: 15px;
              }
              .information {
                  background-color: #60A7A6;
                  color: #FFF;
              }
              .information .logo {
                float:center;
              }
              .information table {
                  padding: 10px;
              }
              .titre
              {
                  text-align:center;
              }
              .qrcode
              {
                border: solid 1px black;
                border-radius: 12px;
                position: absolute;
                padding: 10px;
              }
              span {
              margin-left: 24%;
             }
             .logo
             {
                margin-left: 9%;
             }
          </style>
      
      </head>
      <body>
      
      <div class="information">
          <table width="100%">
              <tr>
                  <td align="left" >
                      <h1>RESERVATION</h1> <pre>
      <br />
      Date: '.Carbon::today()->toDateString().'
      Identifier: #'.$reservaion->idRes.'
      Etat: Payer Online
      </pre>
      
      
                  </td>
                  <td  style="text-align:center;">
                      <img src="storage/festivale/'.$reservaion->Soire->festivale->logoFesImg.'" alt="Logo" width="200px" class="logo"/>
                  </td>
                  <td align="right" >
      
                      <h1>Gestion Festivale</h1>
                      <pre>
                          fsegs.rnu.tn
                          Sfax,Tunis
                          Route Aeroport km 4.5
                          code postal:3000
                      </pre>
                  </td>
              </tr>
      
          </table>
      </div>
      
      
      <br/>
      <div class="titre">
      <h1>'.$reservaion->Soire->festivale->nomFes.'</h1><br/>
      <h2>'.$reservaion->Soire->nomSoi.'</h2>
      <hr style="width:70%;">
      <div>
      <div class="invoice">
          <h3>Reservation No: #'.$reservaion->idRes.'</h3>
          <table class="datatab" >
              <thead>
              <tr>
                  <th></th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              <tr>
                  <td align="left"><h4>Cin Client :</h4></td>
                  <td align="rigth"><h3>'.$reservaion->user->cin.'</h3></td>
              </tr>
              <tr>
                  <td align="left"><h4> Nom et Prenom :</h4></td>
                  <td align="rigth"><h3>'.$reservaion->user->name.' '.$reservaion->user->prenom.'</h3></td>
              </tr>
              <tr>
              <td align="left"><h4>Email Client :</h4></td>
              <td align="rigth"><h3>'.$reservaion->user->email.'</h3></td>
              </tr>
              <tr>
              <td align="left"><h4>Date Réservation :</h4></td>
              <td align="rigth"><h3>'.$reservaion->created_at.'</h3></td>
              </tr>
              <tr>
              <td align="left"><h4>type de Ticket :</h4></td>
              <td align="rigth"><h3>'.$typeTic.'</h3></td>
              </tr>
              <tr>
              <td align="left"><h4>Scene :</h4></td>
              <td align="rigth"><h3>'.$reservaion->Soire->Scene->nomScene.'</h3></td>
              </tr>
          </table>
          <hr style="width:95%;">
      </div>
    

<table class="datatab" style="width:100%;" >
    <tr>
        <th ></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
    <td><h3>Nombre de Place Reservé :</h3> <td>
    <td><h3>'.$reservaion->nbRes.'</h3></td>
    <td style="width: 30%;" ><img class="qrcode" src="'.$reservaion->qrcode.'" alt="qrcode" width="150px" >
    </tr>
    <tr>
    <td style="width: 35%; style="border-bottom:solid 1px;padding-bottom:5px;><h3>Prix de Ticket :</h3><td>
    <td style="width: 35%;style="border-bottom:solid 1px;padding-bottom:5px; ><h3>'.$prixTic.' dt</h3></td>
    </td>
    </tr>
    <tr>
    <td><h3>TOTAL : </h3><td>
    <td><h3>'.$prixTic*$reservaion->nbRes.' dt </h3></td>
    </tr>
 </table>
      
      </body>
      </html>
      ';  
      return $output;
     }
       
     function generateRandomString($length,$cin,$tic,$soi) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString.'_'.$cin.'_'.$tic.'_'.$soi;
    }
    public function test()
    {
        return view ('erreur.erreurpage');

    }
    public function pagepastrouver()
    {
        return view ('erreur.404');
    }
    public function errintern()
    {
        return view ('erreur.500');
    }
    

}
