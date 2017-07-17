//------------mostrar QR
function MostrarQR(btn_QR){
  var ruta = "QR/"+btn_QR.value+"";

  $.get(ruta, function(res){
    var btn_cerrar = $("#cerrar_modal");
    $("#msj_qr").removeClass('text-hide');
    $("#code_QR").html("<div class='img-responsive'>"+res+"</div>");
    $("#msj_qr").addClass('text-hide');
    btn_cerrar.click(function() {
      $("#code_QR").empty();
      $("#msj_qr").removeClass('text-hide');
    });
  });
}

//------------mostrar responsable
function MostrarResp(btn_resp){
  var ruta = "../responsable/"+btn_resp.value+"/edit";

  $.get(ruta, function(res){
    $("#cedula").val(res.cedula);
    $("#name").val(res.name);
    $("#ape").val(res.ape);
    $("#id_resp").val(res.id);
  });
}


//------------mostrar tipos de subcategoras
function MostrarTipoSubCat(btn_tipo_subcat){
  var ruta = "tipos_subcat/"+btn_tipo_subcat.value+"/edit";

  $.get(ruta, function(res){
    $("#sub_cat").val(res.sub_categoria_id);
    $("#co").val(res.codigo);
    $("#de").val(res.descripcion);
    $("#id_ti").val(res.id);
  });
}


// ------------mostrar departamentos
function Mostrar(btn){
  var ruta = "departamentos/"+btn.value+"/edit";

  $.get(ruta, function(res){
    $("#dep").val(res.name);
    $("#id").val(res.id);
  });
}


//------------mostrar ubicaciones
function MostrarUbi(btn_ubi){
  var ruta = "ubi_exactas/"+btn_ubi.value+"/edit";

  $.get(ruta, function(res){
    $("#name_ubicacion").val(res.name);
    $("#id_depart").val(res.departamento_id);
    $("#id_ubicacion").val(res.id);
  });
}


//------------mostrar categorias
function MostrarCat(btn_cat){
  var ruta = "categorias/"+btn_cat.value+"/edit";

  $.get(ruta, function(res){
    var codigo = $("#res_codigo").val(res.codigo);
    var des = $("#res_descripcion").val(res.descripcion);
    $("#id_cat").val(res.id);
  });
}


//------------mostrar categorias
function MostrarSubCat(btn_subcat){
  var ruta = "sub_categorias/"+btn_subcat.value+"/edit";

  $.get(ruta, function(res){
    var codigo = $("#res_codigo_subcat").val(res.codigo);
    var des = $("#res_descripcion_subcat").val(res.descripcion);
    var cat_id = $("#res_cat_id").val(res.categoria_id);
    $("#id_subcat").val(res.id);
  });
}

//------------mostrar status de los bienes
function MostrarStatus(btn_status){
  var ruta = "productos/"+btn_status.value+"/edit";

  $.get(ruta, function(res){
    $("#status_bienes_edit").val(res.status_bienes_id);
    $("#id_bienes_status").val(res.id);
  });
}


//--------- creacion de departamentos
$('#btn-create').click(function() {
  var name = $("#name").val();
  var ruta = 'departamentos';
  var token = $("#token").val();
  var btn = $('#btn-create');
  btn.text('Espere...');
  $.ajax({
    url: ruta,
    headers: {'X-CSRF-TOKEN': token},
    type: 'POST',
    dataType: 'JSON',
    data: {name: name},
  })
  .done(function() {
    $("#modal_create").modal('toggle');
    location.reload(2000);
    $("#mensaje-done").text('Departamento Creado con exito!').fadeIn('slow/400/fast').fadeOut(4000);
    console.log("success");
  })
  .fail(function() {
    if (name == '') {
      $("#modal_create").modal('toggle');
      $("#mensaje-warning").text('El nombre esta vaclo').fadeIn('slow/400/fast').fadeOut(4000);
      btn.text('Registro');
      
    }else{
      $("#modal_create").modal('toggle');
      $("#mensaje-error").text('Departamento Existente').fadeIn('slow/400/fast').fadeOut(4000);
      btn.text('Registro');
    }
  })
});


//--------- creacion de ubicaciones
$('.btn-create-ubi').click(function() {
  var name = $("#name_ubi").val();
  var id_dep = $("#dep_id").val();
  var ruta = 'ubi_exactas';
  var token = $("#token").val();
  var btn = $('.btn-create-ubi');
  btn.text('Espere...');
  $.ajax({
    url: ruta,
    headers: {'X-CSRF-TOKEN': token},
    type: 'POST',
    dataType: 'JSON',
    data: {name: name, departamento_id: id_dep},
  })
  .done(function() {
    $("#modal_create_ubi").modal('toggle');
    location.reload(2000);
    $("#mensaje-done").text('Ubicacion Creado con exito!').fadeIn('slow/400/fast').fadeOut(4000);
  })
  .fail(function() {
    if (name == '' || id_dep == '') {
      $("#modal_create_ubi").modal('toggle');
      $("#mensaje-warning").text('Debe ingresar todos los campos').fadeIn('slow/400/fast').fadeOut(4000);
      btn.text('Registro');
      
    }else{
      $("#modal_create_ubi").modal('toggle');
      $("#mensaje-error").text('Ubicacion Existente').fadeIn('slow/400/fast').fadeOut(4000);
      btn.text('Registro');
    }
  })
});


// -----------editar  departamentos
$("#btn-actualizar").click(function() {
 
  var valor = $("#id").val();
  var dato = $("#dep").val();
  var ruta = "departamentos/"+valor+"";
  var token = $("#token").val();
  var btn = $("#btn-actualizar");
  btn.text('Espere...');
  $.ajax({
    url: ruta,
    headers: {'X-CSRF-TOKEN': token},
    type: 'PUT',
    dataType: 'JSON',
    data: {name: dato},
  })
  .done(function() {
    $("#modal_edit").modal('toggle');
    location.reload(2000);
    $("#mensaje-done").text('Departamento Actualizado').fadeIn('slow/400/fast').fadeOut(4000);
  })
  .fail(function() {
    if (dato == '') {
      $("#modal_edit").modal('toggle');
      $("#mensaje-warning").text('El nombre esta vaclo').fadeIn('slow/400/fast').fadeOut(4000);
      btn.text('Actualizar');
      
    }else{
      $("#modal_edit").modal('toggle');
      $("#mensaje-error").text('Departamento Existente').fadeIn('slow/400/fast').fadeOut(4000);
      btn.text('Actualizar');
    }
  })
  
});
//------ fin de la actualizacion

// -----------editar  ubicaciones
$(".btn-edit-ubi").click(function() {
 
  var dato = $("#name_ubicacion").val();
  var dato2 = $("#id_depart").val();
  var valor = $("#id_ubicacion").val();
  var ruta = "ubi_exactas/"+valor+"";
  var token = $("#token").val();
  var btn = $(".btn-edit-ubi");
  btn.text('Espere...');
  $.ajax({
    url: ruta,
    headers: {'X-CSRF-TOKEN': token},
    type: 'PUT',
    dataType: 'JSON',
    data: {name: dato, departamento_id:dato2},
  })
  .done(function() {
    $("#modal_edit_ubi").modal('toggle');
    location.reload(2000);
    $("#mensaje-done").text('Ubicacion Actualizada').fadeIn('slow/400/fast').fadeOut(4000);
  })
  .fail(function() {
    if (dato == '' || dato2 == '') {
      $("#modal_edit_ubi").modal('toggle');
      $("#mensaje-warning").text('debe llenar todos los campos').fadeIn('slow/400/fast').fadeOut(4000);
      btn.text('Actualizar');
      
    }else{
      $("#modal_edit_ubi").modal('toggle');
      $("#mensaje-error").text('Ubicacion Existente!').fadeIn('slow/400/fast').fadeOut(4000);
      btn.text('Actualizar');
    }
  })
  
});

//------------------------------Creacion de Categorias -----------------------------------
//----------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------
$('.btn_create_cat').click(function() {
  var codigo = $("#codigo").val();
  var descripcion = $("#descripcion").val();
  var token = $("#token").val();
  var ruta = 'categorias';
  var btn = $('.btn_create_cat');
  btn.text('Espere...');
  
  $.ajax({
    url: ruta,
    headers: {'X-CSRF-TOKEN': token},
    type: 'POST',
    dataType: 'JSON',
    data: {codigo: codigo, descripcion: descripcion},
  })
  .done(function() {
    $("#modal_create_cat").modal('toggle');
    $("#p-done").text('Creado con exito!');
    $("#mensaje-done").fadeIn('slow/400/fast').fadeOut(10000);
    location.reload(1000);
  })
  .fail(function(msj) {
      $("#modal_create_cat").modal('toggle');
      $("#p-error").html(msj.responseJSON.codigo+'<br>'+msj.responseJSON.descripcion);
      $("#mensaje-error").fadeIn('slow/400/fast').fadeOut(4000);
      btn.text('Registro');
  })
});


//------------------------------Actualizacion de Categorias ------------------------------
//----------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------
$('.btn_edit_cat').click(function() {
  var codigo = $("#res_codigo").val();
  var descripcion = $("#res_descripcion").val();
  var id_cat = $("#id_cat").val();
  var token = $("#token").val();
  var ruta = "categorias/"+id_cat+"";
  var btn = $('.btn_edit_cat');
  btn.text('Espere...');
  
  $.ajax({
    url: ruta,
    headers: {'X-CSRF-TOKEN': token},
    type: 'PUT',
    dataType: 'JSON',
    data: {codigo: codigo, descripcion: descripcion},
  })
  .done(function() {
    $("#modal_edit_cat").modal('toggle');
    $("#p-done").text('Actualizado con exito!');
    $("#mensaje-done").fadeIn('slow/400/fast').fadeOut(10000);
    location.reload(1000);
  })
  .fail(function(msj) {
      $("#modal_edit_cat").modal('toggle');
      $("#p-error").html(msj.responseJSON.codigo+'<br>'+msj.responseJSON.descripcion);
      $("#mensaje-error").fadeIn('slow/400/fast').fadeOut(3000);
      btn.text('Actualizar');
  })
});



//------------------------------Creacion de SUB - Categorias -----------------------------
//----------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------
$('.btn_create_subcat').click(function() {
  var codigo = $("#codigo_subcat").val();
  var descripcion = $("#descripcion_subcat").val();
  var categoria = $("#cat_id").val();
  var token = $("#token").val();
  var ruta = 'sub_categorias';
  var btn = $('.btn_create_subcat');
  btn.text('Espere...');
  
  $.ajax({
    url: ruta,
    headers: {'X-CSRF-TOKEN': token},
    type: 'POST',
    dataType: 'JSON',
    data: {codigo: codigo, descripcion: descripcion, categoria_id: categoria},
  })
  .done(function() {
    $("#modal_create_subcat").modal('toggle');
    $("#p-done").text('Creado con exito!');
    $("#mensaje-done").fadeIn('slow/400/fast');
    location.reload(1000);
  })
  .fail(function(msj) {
      $("#modal_create_subcat").modal('toggle');
      $("#p-error").html(msj.responseJSON.codigo+'<br>'+msj.responseJSON.descripcion+'<br>'+msj.responseJSON.categoria_id);
      $("#mensaje-error").fadeIn('slow/400/fast').fadeOut(4000);
      btn.text('Registro');
  })
});



//------------------------------Actualizacion de SUB - Categorias -----------------------
//----------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------
$('.btn_edit_subcat').click(function() {
  var codigo = $("#res_codigo_subcat").val();
  var descripcion = $("#res_descripcion_subcat").val();
  var id_cat = $("#res_cat_id").val();
  var id_subcat = $("#id_subcat").val();
  var token = $("#token").val();
  var ruta = "sub_categorias/"+id_subcat+"";
  var btn = $('.btn_edit_subcat');
  btn.text('Espere...');
  
  $.ajax({
    url: ruta,
    headers: {'X-CSRF-TOKEN': token},
    type: 'PUT',
    dataType: 'JSON',
    data: {codigo: codigo, descripcion: descripcion, categoria_id: id_cat},
  })
  .done(function() {
    $("#modal_edit_subcat").modal('toggle');
    $("#p-done").text('Actualizado con exito!');
    $("#mensaje-done").fadeIn('slow/400/fast').fadeOut(10000);
    location.reload(1000);
  })
  .fail(function(msj) {
      $("#modal_edit_subcat").modal('toggle');
      $("#p-error").html(msj.responseJSON.codigo+'<br>'+msj.responseJSON.descripcion+'<br>'+msj.responseJSON.categoria_id);
      $("#mensaje-error").fadeIn('slow/400/fast').fadeOut(3000);
      btn.text('Actualizar');
  })
});


//------------------------------Edit bienes sin responsable ------ -----------------------
//----------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------
$('#form_edit_bienes').on("submit", function(ev) {
  ev.preventDefault();
  var form = $(this);
  var id_bienes = $("#id_bienes").val();
  var token = $("#token").val();
  var ruta = "productos/"+id_bienes+"";
  var btn = $('.btn_edit_bienes');
  btn.text('Espere...');
  
  $.ajax({
    url: ruta,
    headers: {'X-CSRF-TOKEN': token},
    type: 'PUT',
    dataType: 'JSON',
    data: form.serialize(),
  })
  .done(function() {
    $("#modal_edit_bienes").modal('toggle');
    $("#p-done").text('Actualizado con exito!');
    $("#mensaje-done").fadeIn('slow/400/fast').fadeOut(5000);
    location.reload(1000);
  })
  .fail(function(msj) {
      $("#modal_edit_bienes").modal('toggle');
      $("#p-error").html(msj.responseText);
      $("#mensaje-error").fadeIn('slow/400/fast').fadeOut(5000);
      btn.text('Actualizar');
  })
});



//------------------------------Edit responsable ------ ----------------------------------
//----------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------
$('#form_edit_resp').on("submit", function(ev) {
  ev.preventDefault();
  var form = $(this);
  var id_resp = $("#id_resp").val();
  var token = $("#token").val();
  var ruta = "../responsable/"+id_resp+"";
  var btn = $('.btn_edit_resp');
  btn.text('Espere...');
  
  $.ajax({
    url: ruta,
    headers: {'X-CSRF-TOKEN': token},
    type: 'PUT',
    dataType: 'JSON',
    data: form.serialize(),
  })
  .done(function() {
    $("#modal_edit_resp").modal('toggle');
    $("#p-done").text('Actualizado con exito!');
    $("#mensaje-done").fadeIn('slow/400/fast').fadeOut(5000);
    location.reload(1000);
  })
  .fail(function(msj) {
      $("#modal_edit_resp").modal('toggle');
      $("#p-error").html("<p>"+msj.responseText+"</p>");
      $("#mensaje-error").fadeIn('slow/400/fast').fadeOut(5000);
      btn.text('Actualizar');
  })
});



//------------------------------creacion de tipos de subcategorias------------------------
//----------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------
$('#form_create_tipo_subcat').on("submit", function(ev) {
  ev.preventDefault();
  var form = $(this);
  var token = $("#token").val();
  var ruta = "tipos_subcat";
  var btn = $('.btn_create_tipo_subcat');
  btn.text('Espere...');
  
  $.ajax({
    url: ruta,
    headers: {'X-CSRF-TOKEN': token},
    type: 'POST',
    dataType: 'JSON',
    data: form.serialize(),
  })
  .done(function() {
    $("#modal_create_tipo_subcat").modal('toggle');
    $("#p-done").text('Creado con exito!');
    $("#mensaje-done").fadeIn('slow/400/fast').fadeOut(5000);
    location.reload(1000);
  })
  .fail(function(msj) {
      $("#modal_create_tipo_subcat").modal('toggle');
      $("#p-error").html("<p>"+msj.responseText+"</p>");
      $("#mensaje-error").fadeIn('slow/400/fast').fadeOut(4000);
      btn.text('Registro');
  })
});


//------------------------------edicion de tipos de subcategorias------------------------
//----------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------
$('#form_edit_tipo_subcat').on("submit", function(ev) {
  ev.preventDefault();
  var form = $(this);
  var token = $("#token").val();
  var id_ti = $("#id_ti").val();
  var ruta = "tipos_subcat/"+id_ti+"";
  var btn = $('.btn_edit_tipo_subcat');
  btn.text('Espere...');
  
  $.ajax({
    url: ruta,
    headers: {'X-CSRF-TOKEN': token},
    type: 'PUT',
    dataType: 'JSON',
    data: form.serialize(),
  })
  .done(function() {
    $("#modal_edit_tipo_subcat").modal('toggle');
    $("#p-done").text('Actualizado con exito!');
    $("#mensaje-done").fadeIn('slow/400/fast').fadeOut(5000);
    location.reload(1000);
  })
  .fail(function(msj) {
      $("#modal_edit_tipo_subcat").modal('toggle');
      $("#p-error").html("<p>"+msj.responseText+"</p>");
      $("#mensaje-error").fadeIn('slow/400/fast').fadeOut(4000);
      btn.text('Actualizar');
  })
});

//------------------------------edicion de tstatus de bienes------------------------------
//----------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------
$('#form_edit_status').on("submit", function(ev) {
  ev.preventDefault();
  var form = $(this);
  var token = $("#token").val();
  var id_bienes = $("#id_bienes_status").val();
  var ruta = "prod_status/"+id_bienes+"";
  var btn = $('.btn_edit_status');
  btn.text('Espere...');
  
  $.ajax({
    url: ruta,
    headers: {'X-CSRF-TOKEN': token},
    type: 'POST',
    dataType: 'JSON',
    data: form.serialize(),
  })
  .done(function() {
    $("#modal_edit_status").modal('toggle');
    $("#p-done").text('Actualizado con exito!');
    $("#mensaje-done").fadeIn('slow/400/fast').fadeOut(5000);
    location.reload(1000);
  })
  .fail(function(msj) {
      $("#modal_edit_status").modal('toggle');
      $("#p-error").html("<p>"+"ocurrio un error, verifique"+"</p>");
      $("#mensaje-error").fadeIn('slow/400/fast').fadeOut(4000);
      btn.text('Actualizar');
  })
});


// ----- busqueda de ubicacion o subdepartamentos
// ----------------------------------------------
// ---------------------------------------------
$('#dep').change(function(event) {
  $.get("../ubi/"+event.target.value+"",function(response, dep){
    $("#bus_ubicacion").empty();
    for (i = 0; i<response.length; i++) {
        $("#bus_ubicacion").append("<option value='"+response[i].id+"'> "+response[i].name+"</option>"); 
    }
  });
});



// ----- busqueda de subcategorias para creacion de bienes--------------
// ----------------------------------------------
// ---------------------------------------------
$('#cat').change(function(event) {
  $.get("../subcat/"+event.target.value+"",function(response, dep){
    $("#sub_cat").empty();
    for (i = 0; i<response.length; i++) {
        $("#sub_cat").append("<option value='"+response[i].id+"'> "+response[i].descripcion+"</option>"); 
    }
  });
});


// ----- busqueda de tipos_subcat para creacion de bienes--------------
// ----------------------------------------------
// ---------------------------------------------
$('#sub_cat').change(function(event) {
  $.get("../tipo_subcat/"+event.target.value+"",function(response, dep){
    $("#tipo_subcat").empty();
    for (i = 0; i<response.length; i++) {
        $("#tipo_subcat").append("<option value='"+response[i].id+"'> "+response[i].descripcion+"</option>"); 
    }
  });
});


//funciones datapicker hora y formato a español
// ----------------------- datapicker from, to
// -------------------------------------------
// --------------------------------------------
// -------------------------------------------
$(function() {
  var dateFormat = "dd/mm/yy",
    from = $( "#from" )
      .datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1
      })
      .on( "change", function() {
        to.datepicker( "option", "minDate", getDate( this ) );
      }),
    to = $( "#to" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      changeYear: true,
      numberOfMonths: 1
    })
    .on( "change", function() {
      from.datepicker( "option", "maxDate", getDate( this ) );
    });

  function getDate( element ) {
    var date;
    try {
      date = $.datepicker.parseDate( dateFormat, element.value );
    } catch( error ) {
      date = null;
    }

    return date;
  }
} );

// ------ conversion de datapicker a español
$.datepicker.regional['es'] = {
closeText: 'Cerrar',
prevText: '< Ant',
nextText: 'Sig >',
currentText: 'Hoy',
monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
weekHeader: 'Sm',
dateFormat: 'dd/mm/yy',
firstDay: 1,
isRTL: false,
showMonthAfterYear: false,
yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);


//--- inicializar el datatable
$(document).ready(function(){
    $('table').dataTable();
});        

//-- inicializar bootstrap material desing
//$.material.init();


 //-----boton login con efecto ------------
$(".btn-login").click(function(){
    var email = $("#email").val();
    var clave = $("#password").val();
    var login =  $(".btn-login");
    if (email != '' && clave != '') {
      login.text('Espere...').addClass('disabled');
    }  
  });
