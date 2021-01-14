 $("#reservationform").validate({
	rules:{
		required:{
			required:true
		},
		creditCardNumber: {
			required: true,
      creditcard: true
		},
		cardCVC:{
		required: true,
		number:true,
		minlength: 3,
		maxlength: 3

	},
	nbplacedis:{
		required:true,
		min:1,
		max:10,
	},


	errorClass: "help-inline",
	errorElement : 'span',
	highlight:function(element, errorClass, validClass) {
		$(element).parents('.control-group').addClass('error');
	},
	unhighlight: function(element, errorClass, validClass) {
		$(element).parents('.control-group').removeClass('error');
		$(element).parents('.control-group').addClass('success');
	}
},
messages: {
	required: {
		required: "Ce champ est obligatoire",
	},
	creditCardNumber: {
			required: "Ce champ est obligatoire",
			creditcard:	"Le Numero de Carte Banquaire n'est pas Valide",
	},
	cardCVC:{
		required: "Ce champ est obligatoire",
		number:"ce champ doit etre former par des chiffre",
		minlength:"ce champ est doit etre former par 3 chiffre",
		maxlength:"ce champ est doit etre former par 3 chiffre"
	},
	nbplacedis:
	{
		required: "Ce champ est obligatoire",
		min:"le nombre minimale a choisir et 1",
		max:"le nombre minimale a choisir et 10",
	},
}
});

$("#form_signup").validate({
	rules:{
		required:{
			required:true
		},
		name: {
			required: true
		},
		prenom:{
			required: true
		},
		email:{
			required: true,
			email:true
		},
		cin:{
			required: true,
			number:true,
			minlength: 8,
			maxlength: 8
		},
		tel:{
			required: true,
			number:true,
			minlength: 8,
			maxlength: 8
		},
		password:{
			required: true,
			minlength:6,
			maxlength:20
		},
		pwd2:{
			required:true,
			minlength:6,
			maxlength:20,
			equalTo:"#pwd"
		},
	errorClass: "help-inline",
	errorElement: "span",
	highlight:function(element, errorClass, validClass) {
		$(element).parents('.form-element').addClass('error');
	},
	unhighlight: function(element, errorClass, validClass) {
		$(element).parents('.form-element').removeClass('error');
		$(element).parents('.form-element').addClass('success');
	}
},
messages: {
	required: {
		required: "Ce champ est obligatoire",
	},
	name: {
	required: "Ce champ est obligatoire",
	},
	prenom: {
	required: "Ce champ est obligatoire",
	},
	email: {
	required: "Ce champ est obligatoire",
	email:"la format de l'email n'est pas valide"
	},
	cin:{
		required: "Ce champ est obligatoire",
		number:"ce champ doit etre former par des chiffre",
		minlength:"ce champ est doit etre former par 8 chiffre",
		maxlength:"ce champ est doit etre former par 8 chiffre"
	},
	tel:{
		required: "Ce champ est obligatoire",
		number:"ce champ doit etre former par des chiffre",
		minlength:"ce champ est doit etre former par 8 chiffre",
		maxlength:"ce champ est doit etre former par 8 chiffre"
	},
	password:{
		required: "Ce champ est obligatoire",
		minlength:"ce champ doit étre composer par 6 characthere au minumum",
		maxlength:"ce champ doit étre composer par 20 characthere au maximum"
	},
	pwd2:{
		required: "Ce champ est obligatoire",
		minlength:"ce champ doit étre composer par 6 characthere au minumum",
		maxlength:"ce champ doit étre composer par 20 characthere au maximum",
		equalTo:"la mot de pass n'est pas la meme "
	}
}
});
	

$("#form-login").validate({
	rules:{
		required:{
			required:true
		},
		email:{
			required: true,
			email:true
		},
		password_login:
		{
			required:true
		},

	errorClass: "help-inline",
	errorElement: "span",
	highlight:function(element, errorClass, validClass) {
		$(element).parents('.form-element').addClass('error');
	},
	unhighlight: function(element, errorClass, validClass) {
		$(element).parents('.form-element').removeClass('error');
		$(element).parents('.form-element').addClass('success');
	}
},
messages: {
	required: {
		required: "Ce champ est obligatoire",
	},
	email: {
	required: "Ce champ est obligatoire",
	email:"la format de l'email n'est pas valide"
	},
	password_login:
	{
		required: "Ce champ est obligatoire",
	}
}
});
