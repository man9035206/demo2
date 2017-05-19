
$('#category').on('change',function (e) {
    console.log(e);
    var cat_id =e.target.value;
   $.get('/sub_cat?cat_id ='  +cat_id,function (data) {
      /* console.log(data);*/
       $.each(data,function (index,subCatObj) {
           $('#sub_cat').append('<option value="'+subCatObj.id+'">'+subCatObj.name+'</option>')
       })
   })
})

$('#addComment').hide();
$('#reply').on('click',function () {
    $('#addComment').slideToggle(function () {
        $('#addComment').focus()
    });
});



$('#addComment').bind("enterKey",function(e){

});
$('#addComment').keyup(function(e){
    if(e.keyCode == 13)
    {
        $(this).trigger("enterKey");
    }
});