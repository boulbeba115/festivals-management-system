
$(document).ready(function(){
	
	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			number:
			{
				required:true,
				min:0
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			siteSpon:{
				required:true,
				url: true
			},
			capScene:{
				required:true,
				number:true,
				min:0
			},
			sitePm:
			{
				required:true,
				url: true
			},
			telPv:
			{
				required:true,
				digits: true,
				minlength: 8,
				maxlength: 8
			},
			faxPv:
			{
				required:true,
				digits: true,
				minlength: 8,
				maxlength: 8
			},
			telFes:
			{
				required:true,
				digits: true,
				minlength: 8,
				maxlength: 8
			},


		},
		messages: {
			required: {
				required: "Ce champ est obligatoire",
			},
			email: {
			required: "Ce champ est obligatoire",
			email:"la format de l'email n'est pas valide"
			},
			date: {
				required: "Ce champ est obligatoire",
				url:"la format de date n'est pas valide"
				},
			siteSpon: {
			required: "Ce champ est obligatoire",
			url:"la format de l'url n'est pas valide"
			},
			siteSpon: {
				required: "Ce champ est obligatoire",
				url:"la format de l'url n'est pas valide"
			},
			capScene: {
				required: "Ce champ est obligatoire",
				number:"ce champ doit étre numérique",
				min:"la valeur doit etre supprieur a 0"
			},
			number: {
				required: "Ce champ est obligatoire",
				min:"la valeur doit etre supprieur a 0"
			},
			telPv:
			{
				required: "Ce champ est obligatoire",
				digits: "Ce champ doit étre numérique",
				minlength:"le numero de téléphone et formé par 8 chiffre ",
				maxlength:"le numero de téléphone et formé par 8 chiffre "
			},
			faxPv:
			{
				required: "Ce champ est obligatoire",
				digits: "Ce champ doit étre numérique",
				minlength:"le numero de Fax et formé par 8 chiffre ",
				maxlength:"le numero de Fax et formé par 8 chiffre "
			},
			telFes:
			{
				required: "Ce champ est obligatoire",
				digits: "Ce champ doit étre numérique",
				minlength:"le numero de téléphone et formé par 8 chiffre ",
				maxlength:"le numero de téléphone et formé par 8 chiffre "
			},
			
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	$("#form-wizard").validate({
		rules:{
			required:{
				required:true
			},
			telPv:
			{
				required:true,
				digits: true,
				minlength: 8,
				maxlength: 8
			},
			faxPv:
			{
				required:true,
				digits: true,
				minlength: 8,
				maxlength: 8
			},
			pvMapx:
			{
				required:true,
				number: true,
				minlength:7,
			},
			pvMapy:
			{
				required:true,
				number: true,
				minlength:7,
			}

		},
		messages: {
			required: {
				required: "Ce champ est obligatoire",
			},
			telPv:
			{
				required: "Ce champ est obligatoire",
				digits: "Ce champ doit étre numérique",
				minlength:"le numero de téléphone et formé par 8 chiffre ",
				maxlength:"le numero de téléphone et formé par 8 chiffre "
			},
			faxPv:
			{
				required: "Ce champ est obligatoire",
				number: "Ce champ doit étre decimale",
				minlength:"le numero de Fax et formé par 8 chiffre ",
				maxlength:"le numero de Fax et formé par 8 chiffre "
			},
			pvMapx:
			{
				required: "Ce champ est obligatoire",
				digits: "Ce champ doit étre decimale",
				minlength:"la longeur minimale de ce champ et 7",
			},
			pvMapy:
			{
				required: "Ce champ est obligatoire",
				digits: "Ce champ doit étre numérique",
				minlength:"la longeur minimale de ce champ et 7",
			},
						
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
});
$.validator.messages.required = 'Ce champ est obligatoire';
$.validator.messages.min = 'la valeur minimale est 0';
$.validator.messages.url = 'la format de l url nest pas valdie' ;
$.validator.messages.email = 'cette forme nest pas une forme valide de mail' ;



