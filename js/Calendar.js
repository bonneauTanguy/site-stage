var monthInst,
    dayInst,
    preventSet;

dayInst = mobiscroll.eventcalendar('#demo-day', {
    lang: 'fr',
    theme: 'ios',
    themeVariant: 'light',
    display: 'inline',
    view: {
        eventList: { type: 'day' }
    },
    onPageChange: function (event, inst) {
        preventSet = true;
        navigate(monthInst, event.firstDay);
    }
});

monthInst = mobiscroll.eventcalendar('#demo-month', {
    lang: 'fr',
    theme: 'ios',
    themeVariant: 'light',
    display: 'inline',
    view: {
        calendar: { type: 'month' }
    },
    onSetDate: function (event, inst) {
        if (!preventSet) {
            navigate(dayInst, event.date);
        }
        preventSet = false;
    }
});

function navigate(inst, val) {
    if (inst) {
        inst.navigate(val);
    }
}

mobiscroll.util.getJson('https://trial.mobiscroll.com/events/', function (events) {
    dayInst.setEvents(events);
    monthInst.setEvents(events);
}, 'jsonp');

