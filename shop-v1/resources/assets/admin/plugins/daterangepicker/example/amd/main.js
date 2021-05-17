requirejs.config({
    "paths": {
      "jquery": "https://code.jquery.com/jquery-1.11.3.min",
      "moment": "../../moment",
      "daterangepicker": "../../daterangepicker"
    }
});

requirejs(['jquery', 'moment', 'daterangepicker'] , function ($, moment) {
jQuery(document).ready(function() {

  jQuery('#config-text').keyup(function() {
    eval(jQuery(this).val());
  });

  jQuery('.configurator input, .configurator select').change(function() {
    updateConfig();
  });

  jQuery('.demo i').click(function() {
    jQuery(this).parent().find('input').click();
  });

  jQuery('#startDate').daterangepicker({
    singleDatePicker: true,
    startDate: moment().subtract(6, 'days')
  });

  jQuery('#endDate').daterangepicker({
    singleDatePicker: true,
    startDate: moment()
  });

  updateConfig();

  function updateConfig() {
    var options = {};

    if (jQuery('#singleDatePicker').is(':checked'))
      options.singleDatePicker = true;

    if (jQuery('#showDropdowns').is(':checked'))
      options.showDropdowns = true;

    if (jQuery('#showWeekNumbers').is(':checked'))
      options.showWeekNumbers = true;

    if (jQuery('#showISOWeekNumbers').is(':checked'))
      options.showISOWeekNumbers = true;

    if (jQuery('#timePicker').is(':checked'))
      options.timePicker = true;

    if (jQuery('#timePicker24Hour').is(':checked'))
      options.timePicker24Hour = true;

    if (jQuery('#timePickerIncrement').val().length && jQuery('#timePickerIncrement').val() != 1)
      options.timePickerIncrement = parseInt(jQuery('#timePickerIncrement').val(), 10);

    if (jQuery('#timePickerSeconds').is(':checked'))
      options.timePickerSeconds = true;

    if (jQuery('#autoApply').is(':checked'))
      options.autoApply = true;

    if (jQuery('#dateLimit').is(':checked'))
      options.dateLimit = { days: 7 };

    if (jQuery('#ranges').is(':checked')) {
      options.ranges = {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      };
    }

    if (jQuery('#locale').is(':checked')) {
      options.locale = {
        format: 'MM/DD/YYYY HH:mm',
        separator: ' - ',
        applyLabel: 'Apply',
        cancelLabel: 'Cancel',
        fromLabel: 'From',
        toLabel: 'To',
        customRangeLabel: 'Custom',
        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        firstDay: 1
      };
    }

    if (!jQuery('#linkedCalendars').is(':checked'))
      options.linkedCalendars = false;

    if (!jQuery('#autoUpdateInput').is(':checked'))
      options.autoUpdateInput = false;

    if (jQuery('#alwaysShowCalendars').is(':checked'))
      options.alwaysShowCalendars = true;

    if (jQuery('#parentEl').val().length)
      options.parentEl = jQuery('#parentEl').val();

    if (jQuery('#startDate').val().length)
      options.startDate = jQuery('#startDate').val();

    if (jQuery('#endDate').val().length)
      options.endDate = jQuery('#endDate').val();

    if (jQuery('#minDate').val().length)
      options.minDate = jQuery('#minDate').val();

    if (jQuery('#maxDate').val().length)
      options.maxDate = jQuery('#maxDate').val();

    if (jQuery('#opens').val().length && jQuery('#opens').val() != 'right')
      options.opens = jQuery('#opens').val();

    if (jQuery('#drops').val().length && jQuery('#drops').val() != 'down')
      options.drops = jQuery('#drops').val();

    if (jQuery('#buttonClasses').val().length && jQuery('#buttonClasses').val() != 'btn btn-sm')
      options.buttonClasses = jQuery('#buttonClasses').val();

    if (jQuery('#applyClass').val().length && jQuery('#applyClass').val() != 'btn-success')
      options.applyClass = jQuery('#applyClass').val();

    if (jQuery('#cancelClass').val().length && jQuery('#cancelClass').val() != 'btn-default')
      options.cancelClass = jQuery('#cancelClass').val();

    jQuery('#config-text').val("jQuery('#demo').daterangepicker(" + JSON.stringify(options, null, '    ') + ", function(start, end, label) {\n  console.log(\"New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')\");\n});");

    jQuery('#config-demo').daterangepicker(options, function(start, end, label) { console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')'); });

  }

});
});
