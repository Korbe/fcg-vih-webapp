<template>
    <div id="songSlider"
        class="relative flex flex-col sm:flex-row text-center rounded-lg border border-gray-300 bg-white px-2 md:px-6 py-5  items-center justify-center
        md:text-left md:justify-between
        shadow-sm hover:border-brand-primary focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-brand-primary">

        <div id="trackProgress" class="rounded-l-lg h-full absolute w-0 inset-0 bg-brand-primary-100">
        </div>


        <div class="pb-3 md:pb-0 flex-shrink-0">
            <img :alt="post.author" :src="post.author_image" class="relative rounded-full h-16 w-16" />
        </div>

        <div class="basis-full w-full md:pl-4">
            <p class="text-xl md:text-2xl font-medium text-gray-900">
                {{ post.title }}
            </p>
            <p class="py-3 text-base text-gray-500">
                <span class="font-medium hover:underline">{{ post.author }}</span>
                <span class="text-gray-600"> · {{ post.published_at }}</span>
            </p>
        </div>


<!--        <div class="flex">
            <div class="pb-3 md:pb-0 flex-shrink-0">
                <img :alt="post.author" :src="post.author_image" class="relative rounded-full h-16 w-16"/>
            </div>

            <div class="z-10  md:pl-4">
                <p class="text-xl md:text-2xl font-medium text-gray-900">
                    {{ post.title }}
                </p>
                <p class="pt-2 text-base text-gray-500">
                    <span class="font-medium hover:underline">{{ post.author }}</span>
                    <span class="text-gray-600"> · {{ post.published_at }}</span>
                </p>
            </div>
        </div>-->

        <div class="z-10 w-full sm:flex flex-end md:justify-end sm:justify-center">

            <div class="flex space-x-2">

                <a v-if="activeSong != null && activeSong.currentTime > 0"
                   class="p-2 flex items-center justify-center  border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-brand-primary hover:bg-brand-secondary-400"
                   href="#"
                   @click.prevent="addSeconds(audio_id, -10)">
                    <RewindIcon class="h-7 mr-1"/>
                    10s
                </a>

                <a :id="'play_button_' + index" class="p-2 flex items-center justify-center w-full  border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-brand-primary hover:bg-brand-secondary-400"
                   href="#"
                   @click.prevent="playPause(audio_id)">
                    <template v-if="paused">
                        <PlayIcon class="h-7 mr-1"/>
                        <span class="inline-block">{{songTime ?? 'Abspielen'}}</span>
                    </template>
                    <template v-if="!paused">
                        <PauseIcon class="h-7 mr-1"/>
                        <span class="inline-block">{{songTime ?? 'Pause'}}</span>
                    </template>
                </a>

                <a v-if="activeSong != null && activeSong.currentTime > 0"
                   class="p-2 flex items-center justify-center border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-brand-primary hover:bg-brand-secondary-400"
                   href="#"
                   @click.prevent="addSeconds(audio_id, 60)">
                    1min
                    <RewindIcon class="rotate-180 h-7 ml-1"/>
                </a>

            </div>
        </div>

        <audio v-if="post.audio" :id="audio_id" :ref="audio_id" :src="post.audio" @timeupdate="updateTime">
            <source :src="post.audio" type="audio/mp3"/>
            Your browser does not support the audio tag.
        </audio>

        <template v-if="false">
            <!-- Div that plays song, onclick calls the javascript play function and passes the
            id of the audio tag with the appropriate song -->
            <div id="songPlay" @Click="play(audio_id)">Play</div>
            <!-- Div that pauses the song when clicked.  Calls the pause button when clicked. -->
            <div id="songPause" @Click="pause()">Pause</div>
            <!-- Div that switches rather or not to play or pause the song based off of song state -->
            <div id="songPlayPause" @Click="playPause(audio_id)">PlayPause</div>
            <!-- Div that stops the song when clicked -->
            <div id="songStop" @Click="stopSong()">Stop</div>
            <!-- Div that updates with current song time while playing -->

            <div id="volumeUp" @Click="changeVolume(10, 'up')">Plus</div>
            <br>
            <div id="volumeDown" @Click="changeVolume(10, 'down')">Minus</div>
            <!-- Volume Meter sets the new volume on click.  The Volume Status div is embedded inside so it can grow
            within bounds to simulate percentage feel -->
            <div id="volumeMeter" @Click="setNewVolume(this)">
                <div id="volumeStatus"></div>
            </div>
            <span id="volumeThirty" @Click="volumeUpdate(30)">VOLUME 30</span>
            <span id="volumeSixty" @Click="volumeUpdate(60)">VOLUME 60</span>
            <span id="volumeNinety" @Click="volumeUpdate(90)">VOLUME 90</span>
            <!-- Song Slider tracks progress on song time change, if you click it sets the distance into the song
            based on the percentage of where was clicked -->
            <div id="songSlider2" @Click="setSongPosition(this)">
                <div id="trackProgress2"></div>
            </div>
        </template>

    </div>
</template>
<script>
import {PauseIcon, PlayIcon} from "@heroicons/vue/solid";
import {RewindIcon} from "@heroicons/vue/outline";

export default {
    components: {
        PlayIcon, PauseIcon, RewindIcon
    },
    name: 'Post',
    props: {
        post: {
            type: Object
        },
        index: {
            type: Number
        }
    },
    mounted() {
        this.audio_id = 'audio_' + this.index;
    },
    data() {
        return {
            audio_id: '',
            paused: true,
            activeSong: null,
            songTime: null,
        }
    },
    computed: {
        isPaused() {
            return this.activeSong?.paused;
        }
    },
    methods: {

        addSeconds(id, sec) {
            this.activeSong.currentTime = this.activeSong.currentTime + sec;
        },

        //Plays the song. Just pass the id of the audio element.
        play(id) {
            //Sets the active song to the song being played.  All other functions depend on this.
            this.activeSong = document.getElementById(id);
            //Plays the song defined in the audio tag.
            this.activeSong.play();
            this.paused = false;

            //Calculates the starting percentage of the song.
            let percentageOfVolume = this.activeSong.volume / 1;
            let percentageOfVolumeSlider = document.getElementById('volumeMeter').offsetWidth * percentageOfVolume;

            //Fills out the volume status bar.
            document.getElementById('volumeStatus').style.width = Math.round(percentageOfVolumeSlider * 100) / 100 + "px";
        },

        //Stop song by setting the current time to 0 and pausing the song.
        stopSong() {
            this.activeSong.currentTime = 0;
            this.activeSong.pause();
            this.paused = true;
        },

        //Pauses the active song.
        pause() {
            this.activeSong.pause();
            this.paused = true;
        },

//Does a switch of the play/pause with one button.
        playPause(id) {
            //Sets the active song since one of the functions could be play.
            this.activeSong = document.getElementById(id);
            //Checks to see if the song is paused, if it is, play it from where it left off otherwise pause it.
            if (this.activeSong.paused) {
                this.activeSong.play();
                this.paused = false;
            } else {
                this.activeSong.pause();
                this.paused = true;
            }
        },

//Updates the current time function so it reflects where the user is in the song.
//This function is called whenever the time is updated.  This keeps the visual in sync with the actual time.
        updateTime() {
            if (!this.activeSong){
                this.activeSong = document.getElementById(this.audio_id);
                return;
            }

            let currentSeconds = (Math.floor(this.activeSong.currentTime % 60) < 10 ? '0' : '') + Math.floor(this.activeSong.currentTime % 60);
            let currentMinutes = Math.floor(this.activeSong.currentTime / 60);
            //Sets the current song location compared to the song duration.
            this.songTime = currentMinutes + ":" + currentSeconds + ' / ' + Math.floor(this.activeSong.duration / 60) + ":" + (Math.floor(this.activeSong.duration % 60) < 10 ? '0' : '') + Math.floor(this.activeSong.duration % 60);

            //Fills out the slider with the appropriate position.
            let percentageOfSong = (this.activeSong.currentTime / this.activeSong.duration);
            let percentageOfSlider = Math.round(document.getElementById('songSlider' ).offsetWidth * percentageOfSong);

            //Updates the track progress div.
            document.getElementById('trackProgress').style.width = percentageOfSlider + "px";
        },

        volumeUpdate(number) {
            //Updates the volume of the track to a certain number.
            this.activeSong.volume = number / 100;
        },

//Changes the volume up or down a specific number
        changeVolume(number, direction) {
            //Checks to see if the volume is at zero, if so it doesn't go any further.
            if (this.activeSong.volume >= 0 && direction === "down") {
                this.activeSong.volume = this.activeSong.volume - (number / 100);
            }
            //Checks to see if the volume is at one, if so it doesn't go any higher.
            if (this.activeSong.volume <= 1 && direction === "up") {
                this.activeSong.volume = this.activeSong.volume + (number / 100);
            }

            //Finds the percentage of the volume and sets the volume meter accordingly.
            let percentageOfVolume = this.activeSong.volume / 1;
            let percentageOfVolumeSlider = document.getElementById('volumeMeter').offsetWidth * percentageOfVolume;

            document.getElementById('volumeStatus').style.width = Math.round(percentageOfVolumeSlider) + "px";
        },

//Sets the location of the song based off of the percentage of the slider clicked.
        setLocation(percentage) {
            this.activeSong.currentTime = this.activeSong.duration * percentage;
        },

        /*
        Gets the percentage of the click on the slider to set the song position accordingly.
        Source for Object event and offset: http://website-engineering.blogspot.com/2011/04/get-x-y-coordinates-relative-to-div-on.html
        */
        setSongPosition(obj, e) {
            //Gets the offset from the left so it gets the exact location.
            let songSliderWidth = obj.offsetWidth;
            let evtobj = window.event ? event : e;
            clickLocation = evtobj.layerX - obj.offsetLeft;

            let percentage = (clickLocation / songSliderWidth);
            //Sets the song location with the percentage.
            setLocation(percentage);
        },

//Set's volume as a percentage of total volume based off of user click.
        setVolume(percentage) {
            this.activeSong.volume = percentage;

            let percentageOfVolume = this.activeSong.volume / 1;
            let percentageOfVolumeSlider = document.getElementById('volumeMeter').offsetWidth * percentageOfVolume;

            document.getElementById('volumeStatus').style.width = Math.round(percentageOfVolumeSlider) + "px";
        },

//Set's new volume id based off of the click on the volume bar.
        setNewVolume(obj, e) {
            let volumeSliderWidth = obj.offsetWidth;
            let evtobj = window.event ? event : e;
            clickLocation = evtobj.layerX - obj.offsetLeft;

            let percentage = (clickLocation / volumeSliderWidth);
            setVolume(percentage);
        },


    }
}
</script>
