/*#################################################
Created by Jakub Pelc, ©2020
For more info, email me at info@jakub-pelc.8u.cz.
Licensed under creative commons
#################################################*/
#include <Arduino.h>
#include <WiFi.h>
#include <AsyncTCP.h>
#include <ESPAsyncWebServer.h>

AsyncWebServer server(80);

const char* ssid = "netis_3577D0";
const char* password = "password";

const char* PARAM_INPUT_1 = "input1";
const char* PARAM_INPUT_2 = "input2";
const char* PARAM_INPUT_3 = "input3";
const char* PARAM_INPUT_4 = "input4";
const char* PARAM_INPUT_5 = "input5";
const char* PARAM_INPUT_6 = "input6";

// HTML web page to handle 3 input fields (input1, input2, input3)
const char index_html[] PROGMEM = R"rawliteral(
<!DOCTYPE HTML><html><head>
  <title>ESP Input Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head><body>
  <form action="/get">
    Mode: <input type="text" name="input1"> <br />
    Red: <input type="text" name="input2"> <br />
    Green: <input type="text" name="input3"> <br />
    Blue: <input type="text" name="input4"> <br />
    A: <input type="text" name="input5"> <br />
    Delay: <input type="text" name="input6"> <br />
    <input type="submit" value="Submit">
  </form><br />
</body></html>)rawliteral";

void notFound(AsyncWebServerRequest *request) {
  request->send(404, "text/plain", "Not found");
}

void setup() {
  Serial.begin(9600);
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  if (WiFi.waitForConnectResult() != WL_CONNECTED) {
    Serial.println("WiFi Failed!");
    return;
  }
  Serial.println();
  Serial.print("IP Address: ");
  Serial.println(WiFi.localIP());

  // Send web page with input fields to client
  server.on("/", HTTP_GET, [](AsyncWebServerRequest *request){
    request->send_P(200, "text/html", index_html);
  });

  // Send a GET request to <ESP_IP>/get?input1=<inputMessage>
  server.on("/get", HTTP_GET, [] (AsyncWebServerRequest *request) {
    String inputMessage, inputMessage1, inputMessage2, inputMessage3, inputMessage4, inputMessage5, inputMessage6;
    String inputParam;
    
    if (request->hasParam(PARAM_INPUT_1) && request->hasParam(PARAM_INPUT_2) && request->hasParam(PARAM_INPUT_3) && request->hasParam(PARAM_INPUT_4) && request->hasParam(PARAM_INPUT_5) && request->hasParam(PARAM_INPUT_6)) {
      inputMessage1 = request->getParam(PARAM_INPUT_1)->value();
      inputMessage2 = request->getParam(PARAM_INPUT_2)->value();
      inputMessage3 = request->getParam(PARAM_INPUT_3)->value();
      inputMessage4 = request->getParam(PARAM_INPUT_4)->value();
      inputMessage5 = request->getParam(PARAM_INPUT_5)->value();
      inputMessage6 = request->getParam(PARAM_INPUT_6)->value();
      String inputMessage = inputMessage1 + inputMessage2 + inputMessage3 + inputMessage4 + inputMessage5 + inputMessage6;
      Serial.println(inputMessage);
      Serial2.println(inputMessage);
    }
   
    else {
      inputMessage = "No message sent";
      inputParam = "none";
    }
    
    request->send(200, "text/html", "Request was sent <br><a href=\"/\">Return to Home Page</a> <script type=\"text/javascript\">window.close();</script>");
  });
  server.onNotFound(notFound);
  server.begin();
}
void loop() {}
