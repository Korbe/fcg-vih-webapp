<template>
    <div :id="wrapper_id"
        class="relative flex flex-col sm:flex-row text-center rounded-lg border border-gray-300 bg-white px-2 md:px-6 py-5  items-center justify-center
        md:text-left md:justify-between
        shadow-sm hover:border-brand-primary focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-brand-primary">

        <div :id="progress_id" class="rounded-l-lg h-full absolute w-0 inset-0 bg-brand-primary-100">
        </div>


        <div class="z-10 pb-3 md:pb-0 flex-shrink-0">
            <img :alt="post.author" :src="post.author_image" class="relative rounded-full h-16 w-16" />
        </div>

        <div class="z-10  basis-full w-full md:pl-4">
            <p class="text-xl md:text-2xl font-medium text-gray-900">
                {{ post.title }}
            </p>
            <p class="py-3 text-base text-gray-500">
                <span class="font-medium hover:underline">{{ post.author }}</span>
                <span class="text-gray-600"> · {{ post.published_at }}</span>
            </p>
        </div>

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
        this.wrapper_id = 'song-wrapper_' + this.index;
        this.audio_id = 'audio_' + this.index;
        this.progress_id = 'taskprogress_' + this.index;
    },
    data() {
        return {
            wrapper_id: '',
            audio_id: '',
            progress_id: '',
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
        //Does a switch of the play/pause with one button.
        playPause(id) {
            //Sets the active song since one of the functions could be play.
            this.activeSong = document.getElementById(id);
            //Checks to see if the song is paused, if it is, play it from where it left off otherwise pause it.
            if (this.activeSong.paused) {
                this.sendSongUpdate();
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
            let percentageOfSlider = Math.round(document.getElementById(this.wrapper_id ).offsetWidth * percentageOfSong);

            //Updates the track progress div.
            document.getElementById(this.progress_id).style.width = percentageOfSlider + "px";
        },
        sendSongUpdate(){
            //this.$emit('update-song', this.index);
        },
    }
}
</script>
