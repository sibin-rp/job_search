/**
 * Created by sibin on 30/9/16.
 */

'use strict';

$(document).ready(function(){
  $('.common-date-picker').datetimepicker({
    format:'YYYY-MM-DD'
  });

  $('.year-datepicker').datetimepicker({
    format:'YYYY'
  });
});
