# PHP ODBC Excel PoC
A simple proof-of-concept you can use `.xls` files as your database in PHP!

Features a connection using Microsoft’s ACE ODBC driver.

## Screenshots
![Excel ODBC PoC screenshot](resources/screenshot.png)

*Screenshot: ODBC connection, query output as ASCII table.*

## Prequisites
> [!IMPORTANT]  
> **Windows only**  
> This proof‑of‑concept requires Microsoft’s ACE ODBC driver (or other ODBC compatible driver).  
> It will not run under Linux, macOS or Docker.  

- PHP 8+
- PHP extension `odbc` enabled.
- Microsoft Excel Driver (*.xls, *.xlsx, *.xlsm, *.xlsb) (aka. ACE)
- Error reporting enabled in `php.ini`

## Troubleshooting
**PHP failed to load extensions**  
Make sure `extension_dir` points to the extension folder that contains the `php_odbc.dll` file.

**odbc_connect(); is failing**  
Run `odbcad32.exe` (Windows key + r) and make sure you have either of the following drives installed.  
- Microsoft Excel Driver (*.xls, *.xlsx, *.xlsm, *.xlsb)  
- Driver={Microsoft Excel Driver (*.xls)  

Then make sure the `Driver` argument in `$dsn` matches the name of the above.  

Additionally make sure the `$filepath` variable points correctly to your `.xls` file.