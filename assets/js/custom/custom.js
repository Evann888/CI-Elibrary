var table1;
  $(document).ready(function(){
    table1 = $('#table1').DataTable({
      "pagingType": "full_numbers"
    });


  });

  function deleteswal() {
    e.preventDefault(); // <--- prevent form from submitting

    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: [
          'No, cancel it!',
          'Yes, I am sure!'
        ],
        dangerMode: true,
      }).then(function(isConfirm) {
        if (isConfirm) {
          swal({
            title: 'Shortlisted!',
            text: 'Candidates are successfully shortlisted!',
            icon: 'success'
          }).then(function() {
            form.submit(); // <--- submit form programmatically
          });
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });
  }


  // function tambah(){
  //   success:function(data) {
  //            $("#myElem").show();
  //            setTimeout(function() { $("#myElem").hide(); }, 5000);
  //     }
  //
  // }

  function tambahBuku() {
    $('#form_tambah')[0].reset();
    $('#form_tambah').unbind('submit').bind('submit',function(event) {
    var form = $(this);
    event.preventDefault();

      $.ajax({
        url: "http://localhost:8000/prjperpus-ci/Table/tambah",
        type: "POST",
        data : form.serialize(), //converting the form data into array and sending it to server
        dataType : "json",
        success:function(response, status, xhr){
          console.log(response);
            alert("OKAY"); console.log(xhr.status);
          if(response.success === true){
                alert("OK");
            $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
            '<strong><span class="glyphicon glyphicon-ok-sign"> </span></strong>' + response.messages + '</div>');

            // hide the modal
            $("#tambah").modal('hide');

            // update the manageMemberTable
            table1.ajax.reload(null, false);
          } else{
              console.log(xhr.status);

              alert("OK else");
              $(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
              '<strong><span class="glyphicon glyphicon-exclamination-sign"> </span></strong>' + 'Data Gagal Ditambahkan' + '</div>');
              // hide the modal
              $("#tambah").modal('hide');

              // update the manageMemberTable
              // table1.ajax.reload(null, false);
            }
        },   error: function(xhr, ajaxOptions, thrownError){
            alert("ERROR");
                alert(xhr.readyState);
            }
      })
    });
  }

  // function editMember(id) {
  //   if(id) {
  //       // remove the error
  //       // $(".form-group").removeClass('has-error').removeClass('has-success');
  //       // $(".text-danger").remove();
  //       // // empty the message div
  //       // $(".edit-messages").html("");
  //       //
  //       // // remove the id
  //       // $("#member_id").remove();
  //
  //       // fetch the member data
  //       $.ajax({
  //           url: 'action/get_data.php',
  //           type: 'post',
  //           data: {member_id : id},
  //           dataType: 'json',
  //           success:function(response) {
  //               $("#editName").val(response.name);
  //
  //               $("#editAddress").val(response.address);
  //
  //               $("#editContact").val(response.contact);
  //
  //               $("#editActive").val(response.active);
  //
  //               // member id
  //               $(".editMemberModal").append('<input type="hidden" name="member_id" id="member_id" value="'+response.id+'"/>');
  //
  //           } // /success
  //       }); // /fetch selected member info
  //
  //   } else {
  //       alert("Error : Refresh the page again");
  //   }
