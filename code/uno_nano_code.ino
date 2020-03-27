/*#################################################
Created by Jakub Pelc, ©2020
For more info, email me at info@jakub-pelc.8u.cz.
Licensed under creative commons
#################################################*/
#include <U8glib.h>
#include <Adafruit_NeoPixel.h>

#define LED_PIN    7
#define LED_COUNT 147
#define AMPLITUDE 255
int DELAY  = 10;
long int prepis = 0;

U8GLIB_SSD1306_128X64 mujOled(U8G_I2C_OPT_NONE);
Adafruit_NeoPixel strip(LED_COUNT, LED_PIN, NEO_GRB + NEO_KHZ800);

String rs, bs, gs, as, ds, ids;
int r = 0, g = 0, b = 0, a = 0, id = 0;
String datain = "";
double t_var;

void vypis_oled(String oa, String ob, String oc, String od, String oe, String of){
  mujOled.setFont(u8g_font_unifont);
  mujOled.setPrintPos(10, 0);
  mujOled.print("mod: " + oa);
  mujOled.setPrintPos(10, 12);
  mujOled.print("r: " + ob);
  mujOled.setPrintPos(10, 24);
  mujOled.print("g: " + oc);
  mujOled.setPrintPos(10, 36);
  mujOled.print("b: " + od);
  mujOled.setPrintPos(10, 48);
  mujOled.print("a: " + oe);
  mujOled.setPrintPos(10, 60);
  mujOled.print("delay: " + of);
  }
  
void setup() {
  Serial.begin(9600);
  strip.begin();
  strip.show();
  t_var = 0;
}

double psin(double x) {
  return (1 + sin(x))/2;
}

double pcos(double x) {
  return (1 + cos(x))/2;
}

void mode_0(int ampin, int phase) {
  double amp = (double)ampin/255;
  
  for(int i = 0; i < LED_COUNT; i++) {
    double phase = (double)i / LED_COUNT * 2 * PI;
    int R = amp * AMPLITUDE * psin(2*PI*0.125*t_var + phase);
    int G = amp * AMPLITUDE * psin(2*PI*0.5*t_var + phase);
    int B = amp * AMPLITUDE - amp * AMPLITUDE * pcos(2*PI*1*t_var + phase);
    strip.setPixelColor(i, strip.Color(G, R, B));
  }
}

void mode_1(int ampin) {
  double amp = (double)ampin/255;
  
  for(int i = 0; i < LED_COUNT; i++) {
    int shift = (int)(t_var*2);
    
    double phase = (double)i / LED_COUNT * 2 * PI;
    int num = i + shift;
    int R = 0, G = 0, B = 0;
    if(num % 4 == 0)
      R = amp * AMPLITUDE;
    else if(num % 4 == 1)
      G = amp * AMPLITUDE;
    else if(num % 4 == 2)
      B = amp * AMPLITUDE;
    else {
      R = amp * AMPLITUDE;
      G = amp * AMPLITUDE;
    }
    strip.setPixelColor(i, strip.Color(G, R, B));
  }
}

void mode_2(int in0, int in1, int in2, int in3) {
  double phase1 = 2*PI * in0/255;
  double phase2 = 2*PI * in1/255;
  double phase3 = 2*PI * in2/255;
  double phase0 = 2*PI * in3/255;
  
  for(int i = 0; i < LED_COUNT; i++) {
    double phase = (double)i / LED_COUNT * 2 * PI;
    int R = AMPLITUDE * psin(phase + phase0 + phase1);
    int G = AMPLITUDE * psin(phase + phase0 + phase2);
    int B = AMPLITUDE * psin(phase + phase0 + phase3);
    strip.setPixelColor(i, strip.Color(G, R, B));
  }
}

void loop() {
  delay(1);
  if(Serial.available() > 0){
    datain = "";
    while(Serial.available() > 0){
      datain += char(Serial.read());
      delay(2);
      }
    ids = (String)datain[0];
    rs = (String)datain[1] + (String)datain[2] + (String)datain[3];
    gs = (String)datain[4] + (String)datain[5] + (String)datain[6];
    bs = (String)datain[7] + (String)datain[8] + (String)datain[9];
    as = (String)datain[10] + (String)datain[11] + (String)datain[12]; 
    ds = (String)datain[13] + (String)datain[14] + (String)datain[15]; 
    id = ids.toInt();
    r = rs.toInt();
    g = gs.toInt();
    b = bs.toInt();
    a = as.toInt();
    DELAY = ds.toInt();
    }
  switch(id){
    case 1:
    /*
     RESERVED FOR FUTURE ADDONS
     */
    break;
    case 2:
      for(int i = 0; i <= LED_COUNT; i++){
        strip.setPixelColor(i, r, g, b);
        }
      strip.show();
    break;
    case 3:
      mode_0(r, g);
    break;
    case 4:
      mode_1(r);
    break;
    case 5:
      mode_2(r, g, b, a);
    break;
    default:
      for(int i = 0; i <= LED_COUNT; i++){
        strip.setPixelColor(i, random(0, 50), random(0, 50), random(0, 50));
        }
      strip.show();
    break;
    }
  delay(10);

  strip.show();
  t_var += (double)DELAY / 1000;

  if (millis()-prepis > 50) {
    // následující skupina příkazů
    // obnoví obsah OLED displeje
    mujOled.firstPage();
    do {
      // funkce vykresli vykreslí žádaný obsah
      vypis_oled(ids, rs, gs, bs, as, ds);
    } while( mujOled.nextPage() );
    // uložení posledního času obnovení
    prepis = millis();
  }
  
}
