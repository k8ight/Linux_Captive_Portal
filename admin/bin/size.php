<?php
  ######################################################################
  # Human size for files smaller or bigger than 2 GB on 32 bit Systems #
  # size.php - 1.2 - 16.04.2015 - Alessandro Marinuzzi - www.alecos.it #
  ######################################################################
  function showsize($file) {
    if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
      if (class_exists("COM")) {
        $fsobj = new COM('Scripting.FileSystemObject');
        $f = $fsobj->GetFile(realpath($file));
        $size = $f->Size;
      } else {
        $size = trim(@exec("for %F in (\"" . $file . "\") do @echo %~zF"));
      }
    } elseif (PHP_OS == 'Darwin') {
      $size = trim(@exec("stat -f %z " . $file));
    } else {
      $size = trim(@exec("stat -c %s " . $file));
    }
    if (!is_numeric($size)) {
      $size = filesize($file);
    }
    if ($size < 1024) {
      return $size . ' Byte';
    } elseif ($size < 1048576) {
      return round($size / 1024, 2) . ' KB';
    } elseif ($size < 1073741824) {
      return round($size / 1048576, 2) . ' MB';
    } elseif ($size < 1099511627776) {
      return round($size / 1073741824, 2) . ' GB';
    } elseif ($size < 1125899906842624) {
      return round($size / 1099511627776, 2) . ' TB';
    } elseif ($size < 1152921504606846976) {
      return round($size / 1125899906842624, 2) . ' PB';
    } elseif ($size < 1180591620717411303424) {
      return round($size / 1152921504606846976, 2) . ' EB';
    } elseif ($size < 1208925819614629174706176) {
      return round($size / 1180591620717411303424, 2) . ' ZB';
    } else {
      return round($size / 1208925819614629174706176, 2) . ' YB';
    }
	return $size;
  }
?>