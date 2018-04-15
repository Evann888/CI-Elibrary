var table1;
  $(document).ready(function(){
    table1 = $('#table1').DataTable({
      "pagingType": "full_numbers"
    });
  });

  function tambahBuku() {
    $('#form_tambah')[0].reset();
    $('#form_tambah').unbind('submit').bind('submit',function() {
    var form = $(this);

      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data : form.serialize(), //converting the form data into array and sending it to server
        dataType : "json",
        success:function(response, xhr, ajaxOptions, thrownError){
            alert("OKAY"); alert(xhr.status);
          if(response.success === true){
                alert("OK");
            $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
            '<strong><span class="glyphicon glyphicon-ok-sign"> </span></strong>' + response.messages + '</div>')
          } else{
            if(response.messages instanceof Array){
              $.each(response.messages, function(index,value) {
                alert(index);
              });
            } else {
              alert("OK else");
              $(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
              '<strong><span class="glyphicon glyphicon-exclamination-sign"> </span></strong>' + response.messages + '</div>')
            }
          }
        },   error: function(xhr, ajaxOptions, thrownError){
            alert("ERROR");
                alert(xhr.readyState);
            }
      })
    });
  }
