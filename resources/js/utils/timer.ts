import Cookies from '@/utils/cookies'
import { ref } from 'vue';

class Timer {

    public clockTimeCounterCookie = 'clockTime'
    public currentTimeInMinuteCookie = 'currentTimeInMinute'

    public clockTime= ref<number>(0);
    public currentTimeInMinute = ref<number>(20);
    private clock = NaN
    private timer = NaN
    private cookies:Cookies

    constructor(){
        this.cookies = new Cookies()
        this.clockTime = ref<number>(0);
    }

    clockChecker(){
        var parent = this

        this.clock = setInterval(function(){
            parent.clockTime.value ++
            parent.cookies.setCookie(parent.clockTimeCounterCookie, parent.clockTime.value + '', 1);
        }, 1000)
    }

    resetTimer() {
        clearInterval(this.timer)
        clearInterval(this.clock)
        this.clockTime.value = 0
        this.cookies.setCookie(this.clockTimeCounterCookie, 0 + '', 1);
    }

    startTimer() {
        var parent = this
        this.resetTimer()
        this.clockChecker()

        this.cookies.setCookie(this.currentTimeInMinuteCookie, this.currentTimeInMinute.value + '', 1);
        this.timer = setInterval(function(){
            parent.sendSystemNotification("PRZERWA !!", "Odpocznij chwilę");
            parent.clockTime.value = 0
        }, this.currentTimeInMinute.value * 60 * 1000 )
    }

    sendSystemNotification(title:string, body: string) {
        if (!("Notification" in window)) {
            console.error("Twoja przeglądarka nie wspiera systemowych powiadomień.");
            return;
        }

        if (Notification.permission === "granted") {
            new Notification(title, { body });
            return;
        }

        if (Notification.permission !== "denied") {
            Notification.requestPermission().then(permission => {
                if (permission === "granted") {
                    new Notification(title, { body });
                }
            });
        }
    }

}

// Singleton, przesylamy instancje klasy
const timer = new Timer();
timer.clockChecker()

export default timer;