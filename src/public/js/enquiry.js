    function CheckedOthers1() {
      if(document.getElementById('check1').checked) {
        document.getElementById('otherText1').style.display = 'block';
        document.getElementById('otherText1').setAttribute("name","base_type");
      }else if (document.getElementById('water_base').checked){
        document.getElementById('otherText1').style.display = 'none';
      }else if (document.getElementById('oil_base').checked){
        document.getElementById('otherText1').style.display = 'none';
      }else if (document.getElementById('solvent_base').checked){
        document.getElementById('otherText1').style.display = 'none';
      }}
    function CheckedOthers2() {
      if(document.getElementById('check2').checked) {
        document.getElementById('otherText2').style.display = 'block';
        document.getElementById('otherText2').setAttribute("name","liquid_liquid_miscible");
      }else if (document.getElementById('liquid_liquid_miscible').checked){
        document.getElementById('otherText2').style.display = 'none';
      }else if (document.getElementById('liquid_liquid_immiscible').checked){
        document.getElementById('otherText2').style.display = 'none';
      }}
    function CheckedOthers3() {
      if(document.getElementById('check3').checked) {
        document.getElementById('otherText3').style.display = 'block';
        document.getElementById('otherText3').setAttribute("name","solid_liquid_miscible");
      }else if (document.getElementById('solid_liquid_miscible').checked){
        document.getElementById('otherText3').style.display = 'none';
      }else if (document.getElementById('solid_liquid_immiscible').checked){
        document.getElementById('otherText3').style.display = 'none';
      }}
    function CheckedOthers4() {
      if(document.getElementById('check4').checked) {
        document.getElementById('otherText4').style.display = 'block';
        document.getElementById('otherText4').setAttribute("name","heating");
      }else if (document.getElementById('have_heater').checked){
        document.getElementById('otherText4').style.display = 'none';
      }else if (document.getElementById('no_heater').checked){
        document.getElementById('otherText4').style.display = 'none';
      }}
    function CheckedOthers5() {
      if(document.getElementById('check5').checked) {
        document.getElementById('otherText5').style.display = 'block';
        document.getElementById('otherText5').setAttribute("name","heater");
      }else if (document.getElementById('steam').checked){
        document.getElementById('otherText5').style.display = 'none';
      }else if (document.getElementById('heater').checked){
        document.getElementById('otherText5').style.display = 'none';
      }else if (document.getElementById('gas').checked){
        document.getElementById('otherText5').style.display = 'none';
      }}
    function CheckedOthers6() {
      if(document.getElementById('check6').checked) {
        document.getElementById('otherText6').style.display = 'block';
        document.getElementById('otherText6').setAttribute("name","cooling");
      }else if (document.getElementById('have_cooling').checked){
        document.getElementById('otherText6').style.display = 'none';
      }else if (document.getElementById('no_cooling').checked){
        document.getElementById('otherText6').style.display = 'none';
      }}
    function CheckedOthers7() {
      if(document.getElementById('check7').checked) {
        document.getElementById('otherText7').style.display = 'block';
        document.getElementById('otherText7').setAttribute("name","cooler");
      }else if (document.getElementById('water').checked){
        document.getElementById('otherText7').style.display = 'none';
      }else if (document.getElementById('chiller').checked){
        document.getElementById('otherText7').style.display = 'none';
      }}
    function CheckedOthers8() {
      if(document.getElementById('check8').checked) {
        document.getElementById('otherText8').style.display = 'block';
        document.getElementById('otherText8').setAttribute("name","material");
      }else if (document.getElementById('SUS304').checked){
        document.getElementById('otherText8').style.display = 'none';
      }else if (document.getElementById('SUS316').checked){
        document.getElementById('otherText8').style.display = 'none';
      }else if (document.getElementById('steel').checked){
        document.getElementById('otherText8').style.display = 'none';
      }else if (document.getElementById('FRP_coating').checked){
        document.getElementById('otherText8').style.display = 'none';
      }}
    function CheckedOthers9() {
      if(document.getElementById('check9').checked) {
        document.getElementById('otherText9').style.display = 'block';
        document.getElementById('otherText9').setAttribute("name","layer");
      }else if (document.getElementById('single_layer').checked){
        document.getElementById('otherText9').style.display = 'none';
      }else if (document.getElementById('double_layer').checked){
        document.getElementById('otherText9').style.display = 'none';
      }}
    function CheckedOthers10() {
      if(document.getElementById('check10').checked) {
        document.getElementById('otherText10').style.display = 'block';
        document.getElementById('otherText10').setAttribute("name","double_layer");
      }else if (document.getElementById('double_jacket').checked){
        document.getElementById('otherText10').style.display = 'none';
      }else if (document.getElementById('haft_coll').checked){
        document.getElementById('otherText10').style.display = 'none';
      }}
    function CheckedOthers11() {
      if(document.getElementById('check11').checked) {
        document.getElementById('otherText11').style.display = 'block';
        document.getElementById('otherText11').setAttribute("name","insulator");
      }else if (document.getElementById('rockwool').checked){
        document.getElementById('otherText11').style.display = 'none';
      }else if (document.getElementById('PU_foam').checked){
        document.getElementById('otherText11').style.display = 'none';
      }}
    function CheckedOthers12() {
      if(document.getElementById('check12').checked) {
        document.getElementById('otherText12').style.display = 'block';
        document.getElementById('otherText12').setAttribute("name","vessel_head");
      }else if (document.getElementById('flat_head').checked){
        document.getElementById('otherText12').style.display = 'none';
      }else if (document.getElementById('dish_head').checked){
        document.getElementById('otherText12').style.display = 'none';
      }else if (document.getElementById('cone_head').checked){
        document.getElementById('otherText12').style.display = 'none';
      }else if (document.getElementById('open_head').checked){
        document.getElementById('otherText12').style.display = 'none';
      }}
    function CheckedOthers13() {
      if(document.getElementById('check13').checked) {
        document.getElementById('otherText13').style.display = 'block';
        document.getElementById('otherText13').setAttribute("name","vessel_bottom");
      }else if (document.getElementById('flat_bottom').checked){
        document.getElementById('otherText13').style.display = 'none';
      }else if (document.getElementById('dish_bottom').checked){
        document.getElementById('otherText13').style.display = 'none';
      }else if (document.getElementById('cone_bottom').checked){
        document.getElementById('otherText13').style.display = 'none';
      }else if (document.getElementById('open_bottom').checked){
        document.getElementById('otherText13').style.display = 'none';
      }}
    function CheckedOthers14() {
      if(document.getElementById('check14').checked) {
        document.getElementById('otherText14').style.display = 'block';
        document.getElementById('otherText14').setAttribute("name","overlay");
      }else if (document.getElementById('stainless').checked){
        document.getElementById('otherText14').style.display = 'none';
      }else if (document.getElementById('aluminum').checked){
        document.getElementById('otherText14').style.display = 'none';
      }}
    function CheckedOthers15() {
      if(document.getElementById('check15').checked) {
        document.getElementById('otherText15').style.display = 'block';
        document.getElementById('otherText15').setAttribute("name","motor_type");
      }else if (document.getElementById('electric_motor').checked){
        document.getElementById('otherText15').style.display = 'none';
      }else if (document.getElementById('air_motor').checked){
        document.getElementById('otherText15').style.display = 'none';
      }}
    function CheckedOthers16() {
      if(document.getElementById('check16').checked) {
        document.getElementById('otherText16').style.display = 'block';
        document.getElementById('otherText16').setAttribute("name","power_system");
      }else if (document.getElementById('220V').checked){
        document.getElementById('otherText16').style.display = 'none';
      }else if (document.getElementById('380V').checked){
        document.getElementById('otherText16').style.display = 'none';
      }}
    function CheckedOthers17() {
      if(document.getElementById('check17').checked) {
        document.getElementById('otherText17').style.display = 'block';
        document.getElementById('otherText17').setAttribute("name","RPM");
      }else if (document.getElementById('fixed').checked){
        document.getElementById('otherText17').style.display = 'none';
      }else if (document.getElementById('adjustable').checked){
        document.getElementById('otherText17').style.display = 'none';
      }}
    function CheckedOthers18() {
      if(document.getElementById('check18').checked) {
        document.getElementById('otherText18').style.display = 'block';
        document.getElementById('otherText18').setAttribute("name","motor_brand");
      }else if (document.getElementById('ABB_motor').checked){
        document.getElementById('otherText18').style.display = 'none';
      }else if (document.getElementById('SIEMENS_motor').checked){
        document.getElementById('otherText18').style.display = 'none';
      }}
    function CheckedOthers19() {
      if(document.getElementById('check19').checked) {
        document.getElementById('otherText19').style.display = 'block';
        document.getElementById('otherText19').setAttribute("name","inverter_brand");
      }else if (document.getElementById('ABB_inverter').checked){
        document.getElementById('otherText19').style.display = 'none';
      }else if (document.getElementById('MITSUBISHI_inverter').checked){
        document.getElementById('otherText19').style.display = 'none';
      }}
    function CheckedOthers20() {
      if(document.getElementById('check20').checked) {
        document.getElementById('upload_drawing_file').style.display = 'block';
      }else if (document.getElementById('have_drawing').checked){
        document.getElementById('upload_drawing_file').style.display = 'block';
      }else if (document.getElementById('no_drawing').checked){
        document.getElementById('upload_drawing_file').style.display = 'none';
      }}
