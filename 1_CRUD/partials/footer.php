  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <script>
      let alert = document.querySelector('.alert');

      setTimeout(() => {
          // alert.style.display = "none";

          let params = new URLSearchParams(window.location.search);

          let success = params.get("success") || params.get("delete-success") ;

          if (success)
              window.location.assign("/1_CRUD/list.php");
      }, 2000);
  </script>
  </body>

  </html>