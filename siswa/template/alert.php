<?php
  if(isset($_GET["notification"])){ ?>
    <div class="notification">
    <?php
      $notification = $_GET["notification"];
      switch ($notification) {
        case 'success_delete':
          echo "<p>Data has been deleted .</p>";
          break;
        case 'success_update':
          echo "<p>Data has been updated .</p>";
          break;
        case 'success_insert':
          echo "<p>Data has been added .</p>";
          break;
        default:
          break;
      }
    }
     ?>
 </div>
