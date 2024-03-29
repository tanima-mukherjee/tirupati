
/*!
jQuery Yacal Plugin v0.2.0
https://github.com/eduludi/jquery-yacal

Authors:
 - Eduardo Ludi @eduludi
 - Some ideas from Pickaday: https://github.com/dbushell/Pikaday
   (thanks to David Bushell @dbushell and Ramiro Rikkert @RamRik)
 - isLeapYear: Matti Virkkunen (http://stackoverflow.com/a/4881951)
        
Released under the MIT license
 */
(function($, doc, win) {
  "use strict";
  var _eStr, _msInDay, _name, _ph, _version, changeMonth, getDaysInMonth, getWeekEnd, getWeekNumber, getWeekStart, inRange, isDate, isLeapYear, isToday, isWeekend, tag, zeroHour;
  _name = 'yacal';
  _version = '0.5.0';
  _msInDay = 86400000;
  _eStr = '';
  _ph = {
    d: '#day#',
    dc: '#dayclass#',
    dt: '#time#',
    wd: '#weekday#',
    we: '#weekend#',
    t: '#today#',
    s: '#selected#',
    a: '#active#',
    w: '#week#',
    ws: '#weekSelected#',
    wt: '#weekTime#',
    wdn: '#weekdayName#',
    m: '#month#',
    mnam: '#monthName#',
    y: '#year#',
    nav: '#nav#',
    prev: '#prev#',
    next: '#next#',
	none:'#none#',
	cls:'#none#',
  };
  isDate = function(obj) {
    return /Date/.test(Object.prototype.toString.call(obj)) && !isNaN(+obj);
  };
  isWeekend = function(date) {
    var ref;
    return (ref = date.getDay()) === 0 || ref === 6;
  };
  inRange = function(date, min, max) {
    var vmi, vmx;
    vmi = isDate(min);
    vmx = isDate(max);
    if (vmi && vmx) {
      return min <= date && date <= max;
    } else if (vmi) {
      return min <= date;
    } else if (vmx) {
      return date <= max;
    } else {
      return true;
    }
  };
  zeroHour = function(date) {
    return date.setHours(0, 0, 0, 0);
  };
  isToday = function(date) {
    return zeroHour(date) === zeroHour(new Date());
  };
  isLeapYear = function(year) {
    return year % 4 === 0 && year % 100 !== 0 || year % 400 === 0;
  };
  getDaysInMonth = function(year, month) {
    var f, l, s;
    s = 30;
    l = 31;
    f = (isLeapYear(year) ? 29 : 28);
    return [l, f, l, s, l, s, l, l, s, l, s, l][month];
  };
  getWeekNumber = function(date) {
    var onejan;
    onejan = new Date(date.getFullYear(), 0, 1);
    return Math.ceil((((date - onejan) / _msInDay) + onejan.getDay() + 1) / 7);
  };
  getWeekStart = function(date) {
    return new Date(zeroHour(date) - date.getDay() * _msInDay);
  };
  getWeekEnd = function(weekStartDate) {
    return new Date(+weekStartDate + (7 * _msInDay) - 1);
  };
  changeMonth = function(date, amount) {
    return new Date(date.getFullYear(), date.getMonth() + amount, 1);
  };
  tag = function(name, classes, content, data) {
    return '<' + name + ' ' + (classes ? ' class="' + classes + '"' : _eStr) + (data ? ' data-' + data : _eStr) + '>' + (content ? content : _eStr) + '</' + name + '>';
  };
  $.fn.yacal = function(options) {
    return this.each(function(index) {
      var _date, _dayClass, _firstDay, _i18n, _isActive, _maxDate, _minDate, _monthPart, _nearMonths, _pageSize, _selected, _tpl, _wdays, _weekPart, isSelected, isSelectedWeek, opts, ref, renderCalendar, renderDay, renderMonth, renderNav;
      _date = _selected = null;
      _tpl = {};
      _i18n = {};
      _nearMonths = _wdays = _minDate = _maxDate = _firstDay = _pageSize = _isActive = _dayClass = null;
      _weekPart = _monthPart = null;
      isSelected = function(date) {
        return zeroHour(_selected) === zeroHour(date);
      };
      isSelectedWeek = function(wStart) {
        return inRange(_selected, wStart, getWeekEnd(wStart));
      };
      renderNav = function(date) {
		var d = new Date(_minDate); // January 1, 2000
		d.setMonth(d.getMonth() + 1);
		if(date > d){
			return _tpl.nav.replace(_ph.prev, _i18n.prev).replace(_ph.next, _i18n.next).replace(_ph.cls,'prev');
		}else{
			return _tpl.nav.replace(_ph.cls, 'none').replace(_ph.next, _i18n.next);
			//return _tpl.nav.removeClass('prev');
		}
      };
      renderDay = function(date) {
        var ref, ref1;
        return _tpl.day.replace(_ph.d, date.getDate()).replace(_ph.dt, +date).replace(_ph.wd, date.getDay()).replace(_ph.we, isWeekend(date) ? ' weekend' : _eStr).replace(_ph.t, isToday(date) ? ' today' : _eStr).replace(_ph.s, isSelected(date) ? ' selected' : _eStr).replace(_ph.a, ((ref1 = inRange(date, _minDate, _maxDate) && (typeof _isActive === "function" ? _isActive(date) : void 0)) != null ? ref1 : true) ? ' active' : _eStr).replace(_ph.dc, ' ' + ((ref = typeof _dayClass === "function" ? _dayClass(date) : void 0) != null ? ref : _eStr));
      };
      renderMonth = function(date, nav) {
        var d, day, month, out, selWeek, totalDays, wStart, wd, year;
        if (nav == null) {
          nav = false;
        }
        d = 0;
        out = _eStr;
        month = date.getMonth();
        year = date.getFullYear();
        totalDays = getDaysInMonth(date.getYear(), date.getMonth());
        if (_wdays) {
          wd = 0;
          out += _weekPart[0].replace(_ph.w, wd).replace(_ph.wt, _eStr).replace(_ph.ws, _eStr);
          while (wd <= 6) {
            out += _tpl.weekday.replace(_ph.wdn, _i18n.weekdays[wd]).replace(_ph.wd, wd++);
          }
          out += _weekPart[1];
        }
        while (d < totalDays) {
          day = new Date(year, month, d + 1);
          if (0 === d || 0 === day.getDay()) {
            wStart = getWeekStart(day);
            selWeek = isSelectedWeek(wStart) ? ' selected' : _eStr;
            out += _weekPart[0].replace(_ph.w, getWeekNumber(day)).replace(_ph.wt, wStart).replace(_ph.ws, selWeek);
          }
          d++;
          out += renderDay(day, _tpl.day);
          if (d === totalDays || day.getDay() === 6) {
            out += _weekPart[1];
          }
        }
        return _monthPart[0].replace(_ph.m, month).replace(_ph.mnam, _i18n.months[month]).replace(_ph.y, year) + out + _monthPart[1];
      };
      renderCalendar = function(element, move) {
        var cal, nav, nm, out, pm;
        out = '';
        cal = $(element);
        if (move) {
          _date = changeMonth(_date, move);
        }
        if (_nearMonths) {
          pm = _nearMonths;
          while (pm > 0) {
            out += renderMonth(changeMonth(_date, -pm));
            pm--;
          }
        }
        out += renderMonth(_date, true);
        if (_nearMonths) {
          nm = 1;
          while (nm <= _nearMonths) {
            out += renderMonth(changeMonth(_date, +nm));
            nm++;
          }
        }
        cal.html('').append($(_tpl.wrap).append(renderNav(_date)).append(out).append(_tpl.clearfix));
        nav = cal.find('.yclNav');
        nav.find('.prev').on('click', function() {
          return renderCalendar(cal, -_pageSize);
        });
        return nav.find('.next').on('click', function() {
          return renderCalendar(cal, _pageSize);
        });
      };
      opts = $.extend(true, {}, $.fn.yacal.defaults, options);
      if ($(this).data()) {
        opts = $.extend(true, {}, opts, $(this).data());
      }
      _date = _selected = new Date(opts.date);
      _tpl = opts.tpl;
      _i18n = opts.i18n;
      _nearMonths = +opts.nearMonths;
      _wdays = !!opts.showWeekdays;
      if (opts.minDate) {
        _minDate = new Date(opts.minDate);
      }
      if (opts.maxDate) {
        _maxDate = new Date(opts.maxDate);
      }
      _pageSize = (ref = opts.pageSize) != null ? ref : 1;
      _isActive = opts.isActive;
      _dayClass = opts.dayClass;
      _weekPart = _tpl.week.split('|');
      _monthPart = _tpl.month.split('|');
      return renderCalendar(this);
    });
  };
  $.fn.yacal.defaults = {
    date: new Date(),
    nearMonths: 0,
    showWeekdays: 1,
    minDate: null,
    maxDate: null,
    firstDay: 0,
    pageSize: 1,
    tpl: {
      day: tag('a', 'day d' + _ph.wd + '' + _ph.we + '' + _ph.t + '' + _ph.s + '' + _ph.a + '' + _ph.dc, _ph.d, 'time="' + _ph.dt + '"'),
      weekday: tag('i', 'wday wd' + _ph.wd, _ph.wdn),
      week: tag('div', 'week w' + _ph.w + _ph.ws, '|', 'time="' + _ph.wt + '"'),
      month: tag('div', 'month m' + _ph.m, tag('h4', null, _ph.mnam + ' ' + _ph.y) + '|'),
      nav: tag('div', 'yclNav', tag('a', _ph.cls, tag('span', null, _ph.prev)) + tag('a', 'next', tag('span', null, _ph.next))),
      wrap: tag('div', 'wrap'),
      clearfix: tag('div', 'clearfix')
    },
    i18n: {
      weekdays: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
      months: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      prev: 'prev',
      next: 'next',
	  none: 'none'
    }
  };
  $.fn.yacal.version = _version;
  return $('.' + _name).yacal();
})(jQuery, document, window);
