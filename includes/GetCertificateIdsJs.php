  <script>
          var id = '<?php echo $data['certificate_id']; ?>';

            var e = document.getElementById("id");
            //alert(e);
            if(e.checked==true)
            {
              array_push($all_checked, $data['certificate_id']);
            }

</script> 