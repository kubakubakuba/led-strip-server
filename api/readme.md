# HomeAPI
## What do you need?
- Configured led-strip-server setup
- Running ngrok on raspberry pi, or port forwarding
## Setup
Make a database and fillout needed information on the top of index.php file.  
Make a new table with supplied sql file.  
Change values for ngrokid and acceskey if needed. 
Index.php takes values from id=1 row only!  
## Using HomeAPI
Go to index.php and use your acces key to acces it:  
```
http://your.page.io/homeapi/index.php?key=youraccesskey
```
This should display something. When you use wrong access key, it shows an error.
### Displaying color
Use: `&color=your color` to display certain color, this API supports basic 140 HTML colors, more can be easily added.  
Use: `&hex=hexadecimal value` to display color described by hex code. Such as FFFFFF.
### Sending data to the RGB LED strip
Use: `&send` in the adress to send it to the strip.
#### Example
```
http://your.page.io/homeapi/index.php?key=youraccesskey&color=sea green&send
```
You can use spaces in color and hex names, spaces are removed automatically, which can be usefull when using google home, alexa or any other type of home assistant.
