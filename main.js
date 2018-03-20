if (!String.prototype.padStart) {
    String.prototype.padStart = function padStart(targetLength, padString) {
        'use strict';
        targetLength = targetLength >> 0; //truncate if number or convert non-number to 0;
        padString = String((typeof padString !== 'undefined' ? padString : ' '));
        if (this.length > targetLength) {
            return String(this);
        } else {
            targetLength = targetLength - this.length;
            if (targetLength > padString.length) {
                padString += padString.repeat(targetLength / padString.length); //append to original to ensure we are longer than needed
            }
            return padString.slice(0, targetLength) + String(this);
        }
    };
}

//POLYFILL END

function getNextDayOfWeek(date, dayOfWeek) {
    'use strict';

    var resultDate = new Date(date.getTime());

    resultDate.setDate(date.getDate() + (7 + dayOfWeek - date.getDay()) % 7);

    return resultDate;
}

var myParagraph = document.getElementById("countdown"),
    myTargetDate = getNextDayOfWeek(new Date(), 3);
myTargetDate.setHours(12);
myTargetDate.setMinutes(0);
myTargetDate.setSeconds(0);

function countDownTimer(paragraph, targetDate) {
    'use strict';
    var _second = 1000,
        _minute = _second * 60,
        _hour = _minute * 60,
        _day = _hour * 24;

    function update() {
        var currentDate = new Date(),
            distance = targetDate - currentDate,
            days = Math.floor(distance / _day).toString(),
            hours = Math.floor((distance % _day) / _hour).toString(),
            minutes = Math.floor((distance % _hour) / _minute).toString(),
            seconds = Math.floor((distance % _minute) / _second).toString();
        myParagraph.innerHTML = days.padStart(2, "0") + ":" + hours.padStart(2, "0") + ":" + minutes.padStart(2, "0") + ":" + seconds.padStart(2, "0");
    }
    update();
    setInterval(update, 1000)
}

countDownTimer(myParagraph, myTargetDate);
