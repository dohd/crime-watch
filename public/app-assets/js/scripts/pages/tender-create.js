/*=========================================================================================
    File Name: pickers.js
    Description: Pick a date/time Picker, Date Range Picker JS
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: Pixinvent
    Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/
(function (window, document, $) {
    'use strict';
  
    /*******  Flatpickr  *****/
    var basicPickr = $('.flatpickr-basic'),
       basicPickrBlank = $('.flatpickr-basic-blank'),
      timePickr = $('.flatpickr-time'),
      dateTimePickr = $('.flatpickr-date-time'),
      date = new Date(),
      multiPickr = $('.flatpickr-multiple'),
      rangePickr = $('.flatpickr-range'),
      humanFriendlyPickr = $('.flatpickr-human-friendly'),
      disabledRangePickr = $('.flatpickr-disabled-range'),
      inlineRangePickr = $('.flatpickr-inline');
  
    // Default
    if (basicPickr.length) {
      basicPickr.flatpickr({
        defaultDate: date,
        dateFormat: "d-m-Y",

      });
    }
      // Default blank
      if (basicPickrBlank.length) {
        basicPickrBlank.flatpickr({
          dateFormat: "d-m-Y",
  
        });
      }
  
    // Time
    if (timePickr.length) {
      timePickr.flatpickr({
        enableTime: true,
        noCalendar: true
      });
    }
  
    // Date & TIme
    if (dateTimePickr.length) {
      dateTimePickr.flatpickr({
        defaultDate: date,
        enableTime: true,
        dateFormat: "d-m-Y H:i",
      });
    }
  
    // Multiple Dates
    if (multiPickr.length) {
      multiPickr.flatpickr({
        weekNumbers: true,
        mode: 'multiple',
        minDate: 'today'
      });
    }
  
    // Range
    if (rangePickr.length) {
      rangePickr.flatpickr({
        mode: 'range'
      });
    }
  
    // Human Friendly
    if (humanFriendlyPickr.length) {
      humanFriendlyPickr.flatpickr({
        altInput: true,
        altFormat: 'F j, Y',
        dateFormat: 'Y-m-d'
      });
    }
  
    // Disabled Range
    if (disabledRangePickr.length) {
      disabledRangePickr.flatpickr({
        dateFormat: 'Y-m-d',
        disable: [
          {
            from: new Date().fp_incr(2),
            to: new Date().fp_incr(7)
          }
        ]
      });
    }
  
    // Inline
    if (inlineRangePickr.length) {
      inlineRangePickr.flatpickr({
        inline: true
      });
    }

 
 
  })(window, document, jQuery);
  