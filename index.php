<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

    <div class="banner">
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="header-text caption">
              <h2>Search your domain</h2>
              <div id="search-section">
                <form id="suggestion_form" name="gs" method="get" action="#">
                <div class="searchText">
                  <input type="text" name="q" class="searchText" placeholder="Enter your domain here..." autocomplete="on">
                </div>
                    <input type="submit" name="results" class="main-button" value="Search Now">
                 </form>
               <div class="advSearch_chkbox">
               </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

   
<?php include 'includes/footer.php'; ?>
</body>
</html>
