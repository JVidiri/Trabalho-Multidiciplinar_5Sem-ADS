#!/path/to/php
<?php
fwrite(STDOUT,  "Please enter in an alphanumeric string: ");
$line = trim(fgets(STDIN));
if (!ctype_alpha($line)) {
    fwrite(STDERR, "The information you entered contained more information that alphanumeric characters.\r\n");
} else {
    fwrite(STDOUT, $line . "\r\n");
}
?>