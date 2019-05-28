<?php
//var_dump($_POST);
if(isset($_POST["book"]) && !empty($_POST["book"])){
    echo $_POST['listcountry'].','.$_POST['country'].','.$_POST['phone'].','.$_POST['phonefull'];
}
?>
<html>
<head>
    <title>INTEL INPUT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.5.0/css/intlTelInput.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.5.0/js/intlTelInput.js"></script>  
    <script>
      $(function () {
      $("#phone").intlTelInput({
            autoHideDialCode: true,
            autoPlaceholder: true,
            separateDialCode: true,
            nationalMode: true,
            geoIpLookup: function (callback) {
                $.get("http://ipinfo.io", function () {}, "jsonp").always(function (resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            initialCountry: "auto",
        });

        // get the country data from the plugin
        var countryData = $.fn.intlTelInput.getCountryData(),
          telInput = $("#phone"),
          addressDropdown = $("#listcountry");

        // init plugin
        telInput.intlTelInput({
          utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.5.0/js/utils.js" // just for formatting/placeholders etc
        });

        // populate the country dropdown
        $.each(countryData, function(i, country) {
          addressDropdown.append($("<option></option>").attr("value", country.iso2).text(country.name));
        });

        // listen to the telephone input for changes
        telInput.on("countrychange", function() {
          var countryCode = telInput.intlTelInput("getSelectedCountryData").iso2;
          addressDropdown.val(countryCode);
        });

        // trigger a fake "change" event now, to trigger an initial sync
        telInput.trigger("countrychange");

        // listen to the address dropdown for changes
        addressDropdown.change(function() {
          var countryCode = $(this).val();
          telInput.intlTelInput("setCountry", countryCode);
        });

        // update the hidden input on submit
        $("form").submit(countryData,function(i, country) {
          $("#country").val(telInput.intlTelInput("getSelectedCountryData").name);
          $("#phonefull").val('+' + telInput.intlTelInput("getSelectedCountryData").dialCode + $("#phone").val());      
        });

      });
    </script>
</head>
<body>
    <form action=""  method="post" enctype="multipart/form-data" id="rsv">
        <table width="100%" align="center" border="0" cellpadding="5" cellspacing="5">
            <tbody>                             
                <tr>
                    <td>Country:</td>
                    <td>
                        <select name="listcountry" id="listcountry"></select>
                        <input type="hidden" name="country" id="country" />
                    </td>
                </tr>
                <tr>
                    <td>Guest phone No.:</td>
                    <td>
                        <?php /* <input type="tel" name="phone" value="62361761688" size="40"> */ ?>
                        <input type="tel" name="phone" id="phone" placeholder="">
                        <input type="hidden" name="phonefull" id="phonefull" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" valign="middle">
                        <div class="myhr" style="border-bottom: 1px solid #E2E2E2;"></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" valign="middle">
                        Questions and special requests:<br><br><p></p>
                        <p>
                            <textarea name="message" cols="40" rows="10"></textarea>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="left">
                        <input type="submit" name="book" value="Book Now">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>