function printDiv() {
  var table = document.getElementById("printableTable").outerHTML;

  var style = "<head><title>***Generated using Faculty IDP Generator***</title>"
    style = style + "<style>";
    style = style + "* {padding: 0;margin: 0;box-sizing: border-box;}body {font-family: 'Calibri';}";
    style = style + "#uppercase {text-transform: uppercase;}#lightor {background: rgb(255, 244, 238);}#midDay {vertical-align: middle;}";
    style = style + "#tbl-sched-display {width: 500px;border-collapse: collapse;font-size: 12px;}#tbl-sched-display td {border: 1px solid black; width: 20%;vertical-align: middle;}#tbl-sched-display #tdwidth {width: 30%;}";
    style = style + "#tbl-sched-display tr:first-child td { border-top: 0; }#tbl-sched-display tr td:first-child { border-left: 0; }#tbl-sched-display tr:last-child td { border-bottom: 0; }#tbl-sched-display tr td:last-child { border-right: 0; } ";
    style = style + ".header {display: flex;justify-content: space-around;padding: 3px 7px;width: 100%;}";
    style = style + ".header-0 {flex: 1;display: flex;justify-content: center;align-items: center;font-size: 14px;}";
    style = style + ".header-0 .QTB {width: 100%;border: 2px solid black; padding: 10px;font-size: 12px;}";
    style = style + ".QTB #tbl-AC {font-weight: 600;}.QTB #tbl-right {text-align: center;}";
    style = style + ".header-1 {display: flex;justify-content: space-around;flex: 2;}";
    style = style + ".header-1 .header-1-1 {flex: 1;display: flex;justify-content: center;align-items: center;}";
    style = style + ".header-1-1 img,.header-1-3 img {width: 60%;}";
    style = style + ".header-1 .header-1-2 {flex: 2;text-align: center;}";
    style = style + ".header-1 .header-1-2 .header-center-text {padding: 5px;margin-bottom: 2px;}";
    style = style + ".header-1 .header-1-2 .header-center-bold {line-height: 20px;}";
    style = style + ".header-1 .header-1-3 {flex: 1;display: flex;justify-content: center;align-items: center;}";
    style = style + ".header-2 {flex: 1;display: flex;justify-content: center;align-items: center;}";
    style = style + ".header-2 .OO {border: 2px solid black; width: 100%;font-size: 12px;}";
    style = style + ".OO th {text-align: center;}.OO td {text-align: center;}";
    style = style + "main {width: 100%;font-size: 12px;}";
    style = style + "main .user-details {display: flex;justify-content: space-around;width: 80%;padding: 3px;}";
    style = style + ".user-details .tbl-user-details-left {flex: 1;width: 50%; font-size: 12px; }";
    style = style + ".user-details .tbl-user-details-right {flex: 1;width: 50%; font-size: 12px; }";
    style = style + ".schedule .tbl-schedule {width: 100%; font-size: 12px; border: 1px solid black;}";
    style = style + ".tbl-schedule th {width: 3rem;} .tbl-schedule td {text-align: center;vertical-align: top;text-transform: uppercase;}";
    style = style + "footer {position: absolute;bottom: 0;left: 0;display: flex;justify-content: space-around;width: 100%;height: 5rem;font-size: 12px;padding: 0 5px;}";
    style = style + "footer .officials {font-size: 12px;width: 100%;}";
    style = style + "#qrID {width: 7rem; height: 7rem; position: absolute; bottom: 0; right: 5px}";
    style = style + ".officials th {padding: 15px 10px 0 10px;}";
    style = style + "</style></head>";

  window.frames["print_frame"].document.body.outerHTML = style + table;
  window.frames["print_frame"].window.focus();
  window.frames["print_frame"].window.print();
}

//zoom qr code
function zoomIn() {
  document.getElementById("code").style.display = "block";
}
function zoomOut() {
  document.getElementById("code").style.display = "none";
}
//qr generate
function htmlEncode(value) {
  return $("<div/>").text(value).html();
}

$(function () {
    $(".qr-code").attr(
      "src",
      "https://chart.googleapis.com/chart?cht=qr&chl=" +
        htmlEncode($("#content").val()) +
        "&chs=160x160&chld=L|0"
    );
});
