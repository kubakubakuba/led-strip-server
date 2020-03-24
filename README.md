# led-strip-server
Simple program for Neopixel led strips. Controlled using ESP32 and Arduino UNO/Nano...

# How to upload?
Upload the code for uno/nano to Arduino of your choice.
Upload esp32_webserver.ino to esp32.
Connect the processors on this way:

GND of ESP32 ------ GND of Arduino

TX0 of ESP32 ------ RX of Arduino

You can adjust the number of LEDs as well as the led pin in the Arduino code.

# How to controll?
Open serial monitor on correct COM port, while connected to ESP32. Have the correct baudrate of 9600.
ESP shoul write out its ip adress.
Then simply enter the IP in your browser.
All parameters need to be written as 3-character numbers (5 needs to be written as 005).
Mode is just one number(0-9)

# Controlling alternatives
If you have webpage hosting you can download source code from /web folder.
These files have improved controlls (5 is automatically converted to 005).
You can also visit https://j.8u.cz/projects/led_strip/ which has the same code.

# To be updated in future
- I will work on better UI
- I will add more animations
- Electronics board schematic will be drawn.
- More XMas modes :)

# What else?
Feel free to customise the code!
Enjoy :)
