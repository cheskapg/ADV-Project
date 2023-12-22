<!-- jQuery -->
<script src="../dist/js/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../dist/js/jquery/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../dist/js/bootstrap/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<!-- <script src="../plugins/chart.js/Chart.min.js"></script>  -->
<script src="../plugins/chart.js/Chart.min.3.7.1.js"></script>

<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<!-- <script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script> -->
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Moment -->
<script src="../plugins/moment/moment.min.js"></script>
<!-- Daterangepicker -->
<script src="../plugins/daterangepicker/daterangepicker.js"></script>

<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

     <!-- Active Script -->
<script>
 var url = window.location;

// for sidebar menu entirely but not cover treeview
$('ul.nav-sidebar a').filter(function() {
    return this.href == url;
}).addClass('active');

// for treeview
$('ul.nav-treeview a').filter(function() {
    return this.href == url;
}).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');

</script>



<!-- DATATABLES -->
<script>
    $(function () {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  
  <!-- Daterangepicker -->
<script>
  $(function() {
    $('input[name="daterange"]').daterangepicker({
      opens: 'left'
    }, function(start, end, label) {
      console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
  });
</script>



<!--  Changing the Image Preview-->
<script>
  // Admin
      function adminImg(){
        document.querySelector('#adminimg').click();
      }
      function displayAdminImg(e){
        if(e.files[0]){
          var reader = new FileReader();
    
          reader.onload = function(e){
            document.querySelector('#admindisplay').setAttribute('src',e.target.result);
          }
          reader.readAsDataURL(e.files[0]);
        }    
      }
  // User
  function userImg(){
        document.querySelector('#add_userimg').click();
      }
      function displayUserImg(e){
        if(e.files[0]){
          var reader = new FileReader();
    
          reader.onload = function(e){
            document.querySelector('#userdisplay').setAttribute('src',e.target.result);
          }
          reader.readAsDataURL(e.files[0]);
        }    
      }
        
</script>
<!-- End of Image Preview -->


<!-- Bar chart
<script>
  $(function () {

    // CHART DATA
    var ChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [
        {
          label               : 'Sales',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 91]
        },
        {
          label               : 'Registered Users',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

   
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, ChartData)
    var temp0 = ChartData.datasets[0]
    var temp1 = ChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

  })
</script> -->

<!-- Select2 -->
<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    });
    </script>

    <!-- Displaying Image from DB for admin -->
    <!-- <script>
$(document).ready(function(){
  
    $('.navbar-prof').attr("src", "../dist/img/userimg/<?php // echo $_SESSION['admin']['photo'] ?>")      
});
</script> -->

<!-- Check radio Buttons for Gender -->
<?php
$gender = $_SESSION['admin']['gender'];
if($gender === "Female")
{
  echo '<script>
  document.getElementById("radFemale").checked = true;
</script>';
}
else if($gender === "Male")
{
  echo'<script>
  document.getElementById("radMale").checked = true;
</script>';
}
else if($gender === ""){
  echo'<script>
  document.getElementById("radMale").checked = false;
  document.getElementById("radFemale").checked = false;
  </script>';   
}
// it end here radio button check

// Notification
echo $notif;


?>

<!-- Toggle Change Profile -->
<script>
  function changeProf(){
    $("#ChangeImgOff").toggle(function(){
      $('#adminimg').prop('disabled', (i, v) => !v);
    })
    $("#ChangeImgOn").toggle();
    $("#uploadButton").toggle()
  }
</script>

<!-- Modal Change Password -->
<script>
    $(document).ready(function(){    
    $('#changepswSave').on('click', function(){     
    	var currentpsw = $('#currentpsw').val();
    	var newpsw = $('#newpsw').val();
    	var repeatpsw = $('#repeatpsw').val();

    	if(currentpsw.trim() == '' ){
            $('.statusMsg').html('<div class="alert alert-danger" role="alert">Please enter the empty field!</div>');
        $('#currentpsw').focus();
        return false;
    }else if(newpsw.trim() == '' ){
        $('.statusMsg').html('<div class="alert alert-danger" role="alert">Please enter the empty field!</div>');
        $('#newpsw').focus();
        return false;
    }else if(repeatpsw.trim()== ''){
        $('.statusMsg').html('<div class="alert alert-danger" role="alert">Please enter the empty field!</div>');
        $('#repeatpsw').focus();
        return false;
}        else{
        $.ajax({
            type: 'POST',
            url: '../admin/includes/updatepsw.php',
            data: {
              currentpsw: currentpsw,
              newpsw: newpsw,
              repeatpsw: repeatpsw
            },
            success: function(data){
              var s = "success";
              if(data !== 'success'){
                // $('.statusMsg').html('<div class="alert alert-success" role="alert">Password Updated Successfully!</div>');
                // $('#currentpsw').val('');                               
                // $('#newpsw').val('');
                // $('#repeatpsw').val(''); 
                // $('#changepswmodal').hide();
                $('.statusMsg').html(data);
              }
              else{
                // $('.statusMsg').html(data);

                $('.statusMsg').html('<div class="alert alert-success" role="alert">Password Updated Successfully!</div>');
                $('#currentpsw').val('');                               
                $('#newpsw').val('');
                $('#repeatpsw').val(''); 
                $('#changepswmodal').hide();
              }
              
            }
        })
    }
    	});
        
    });
</script>

