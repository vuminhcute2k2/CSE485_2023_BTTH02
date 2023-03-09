<?php foreach ($errors as $key => $value) {
  if ($value) {
    echo ('<div class="alert alert-danger" role="alert">');
    echo  $value;
    echo ('</div>');
  }
}
