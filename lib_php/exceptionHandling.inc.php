<?php
/*
The MIT License (MIT)

Copyright (c) 2019 June 13 Maxime De Clercq

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORTOR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

/*
 * This function will save PHP errors / exceptions
 * in an errorlog. While in development, the user gets
 * the full error shown, while in production, the user
 * gets to see a short message that something went wrong.
 *
 * The exception will regardless get logged with date-time,
 * the error message, the script and the line number where
 * the error / exception occurred in the logfile (csv).
 *
 * @author Maxime De Clercq
 * @original Micky De Pauw
 * @param  [object] $_exception [exception]
 * @param  [string] $_logfile   [log-file + folder]
 * @return [string] [user-message]
 */
function exceptionHandling($_exception, $_logfile)
{
  if ($_SERVER['SERVER_NAME'] != "localhost")
  {
    // Message while in Production
    $_msg = "There has been an error, please try again.<br>
      If the error persists, please contact the web-master.<br>
      Our apologies for the inconvenience."
    ;
  }
  else
  {
    // Complete error message while localhost
    $_msg = "<hr>
      <strong>Exception</strong><br><br>
      Errormessage: ".$_exception->getMessage()."<br><br>
      File: ".$_exception->getFile()."<br>
      Line Number: ".$_exception->getLine()."<br><hr>"
    ;
  }

// exception log
  $_error_log[1] = strftime("%d-%m-%Y %H:%M:%S");
  $_error_log[2] = $_exception->getMessage();
  $_error_log[3] = $_exception->getFile();
  $_error_log[4] = $_exception->getLine();

  $_pointer = fopen("$_logfile","ab");
  fputcsv($_pointer, $_error_log);
  fclose($_pointer);

// user-message
  return $_msg;
}
?>
