<template>
    <div ref="wrapper"
        class="relative flex flex-col sm:flex-row text-center rounded-lg border border-gray-300 bg-white px-2 md:px-6 py-5  items-center justify-center
        md:text-left md:justify-between
        shadow-sm hover:border-brand-primary focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-brand-primary">

        <div ref="progressBox"  class="rounded-l-lg h-full absolute w-0 inset-0 bg-brand-primary-100"></div>

        <div class="z-10 pb-3 md:pb-0 flex-shrink-0">
            <img loading="lazy" :alt="post.author" :src="post.author_image" class="relative rounded-full h-16 w-16" />
        </div>

        <div class="z-10 basis-full w-full md:pl-4">

            <p v-if="completed" class="text-brand-primary flex">
                <BadgeCheckIcon class="h-7 mr-1"/>
                <span class="inline-block">{{'Angehört'}}</span>
            </p>

            <p class="text-xl md:text-2xl font-medium text-gray-900">
                {{ post.title }}
            </p>
            <p class="py-3 text-base text-gray-500">
                <span class="font-medium hover:underline">{{ post.author }}</span>
                <span class="text-gray-600"> · {{ post.published_at }}</span>
            </p>
        </div>

        <div v-if="post.audio && audioRef" class="z-10 w-full sm:flex flex-end md:justify-end sm:justify-center">
            <div class="flex space-x-2">

                <a v-if="audioRef.currentTime > 0"
                   class="p-2 flex items-center justify-center  border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-brand-primary hover:bg-brand-secondary-400"
                   href="#"
                   @click.prevent="addSeconds(-10)">
                    <RewindIcon class="h-7 mr-1"/>
                    10s
                </a>

                <a :id="'play_button_' + index" class="p-2 flex items-center justify-center w-full  border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-brand-primary hover:bg-brand-secondary-400"
                   href="#"
                   @click.prevent="playPause()">
                    <template v-if="audioRef.paused">
                        <PlayIcon class="h-7 mr-1"/>
                        <span class="inline-block">{{songTime ?? 'Abspielen'}}</span>
                    </template>
                    <template v-else>
                        <PauseIcon class="h-7 mr-1"/>
                        <span class="inline-block">{{songTime ?? 'Pause'}}</span>
                    </template>
                </a>

                <a v-if="audioRef.currentTime > 0"
                   class="p-2 flex items-center justify-center border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-brand-primary hover:bg-brand-secondary-400"
                   href="#"
                   @click.prevent="addSeconds(60)">
                    1min
                    <RewindIcon class="rotate-180 h-7 ml-1"/>
                </a>

            </div>
        </div>

        <audio :id="audio_id" ref="audioRef" @timeupdate="onTimeUdate" @ended="onEnded">
                <source :src="post.audio" type="audio/mp3"/> Your browser does not support the audio tag.
        </audio>
    </div>
</template>
<script>
import {PauseIcon, PlayIcon} from "@heroicons/vue/solid";
import {RewindIcon, BadgeCheckIcon} from "@heroicons/vue/outline";

import { hashIt } from "@/Shared/HashIt"
import { Inertia } from '@inertiajs/inertia';

export default {
    components: {
        PlayIcon, PauseIcon, RewindIcon,BadgeCheckIcon
    },
    name: 'PostAudioPlayer',
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
        this.audioRef = this.$refs.audioRef;

        let completedHistory = JSON.parse(localStorage.getItem("completion-hist")) ?? [];
        if(completedHistory && completedHistory.includes(this.getHash()))
            this.completed = true;
    },
    data() {
        return {
            audioRef: null,
            songTime: null,
            completed: false,
            audio_id: '',
            viewStatRecorded: false,
        }
    },
    methods: {
        songActive(){
            //this.$emit('active', this.index);
        },
        addSeconds(sec) {
            this.audioRef.currentTime += sec;
        },
        //Does a switch of the play/pause with one button.
        playPause() {
            //Checks to see if the song is paused, if it is, play it from where it left off otherwise pause it.
            if (this.audioRef.paused) {
                this.songActive();
                this.completed = false;
                this.audioRef.play();
                this.SetPostViewed();
            } else
                this.audioRef.pause();
        },
        //Updates the current time function so it reflects where the user is in the song.
        //This function is called whenever the time is updated.  This keeps the visual in sync with the actual time.
        onTimeUdate() {
            let { currentTime, duration } = this.audioRef;

            let currentSeconds = (Math.floor(currentTime % 60) < 10 ? '0' : '') + Math.floor(currentTime % 60);
            let currentMinutes = Math.floor(currentTime / 60);
            //Sets the current song location compared to the song duration.
            this.songTime = currentMinutes + ":" + currentSeconds + ' / ' + Math.floor(duration / 60) + ":" + (Math.floor(duration % 60) < 10 ? '0' : '') + Math.floor(duration % 60);

            //Fills out the slider with the appropriate position.
            let percentageOfSong = (currentTime / duration);
            let percentageOfSlider = Math.round(this.$refs.wrapper.offsetWidth * percentageOfSong);

            //Updates the track progress div.
            this.$refs.progressBox.style.width = percentageOfSlider + "px";
        },
        getHash(){
           return hashIt(this.post.author + "." + this.post.title);
        },
        onEnded(){
            this.audioRef.pause();
            this.audioRef.currentTime = 0;
            this.completed = true;
            this.$refs.progressBox.style.width = "0px";

            this.SetPostCompleted();

            let completedHistory = JSON.parse(localStorage.getItem("completion-hist") ) ?? [];

            if(!completedHistory.includes(this.getHash()))
                localStorage.setItem("completion-hist", JSON.stringify([...completedHistory, this.getHash()]));
        },
        SetPostViewed(){
            if(!this.viewStatRecorded){
                Inertia.post(route('public.blog.post.viewed', this.post.id), null, { preserveScroll: true });
                this.viewStatRecorded = true;
            }
        },
        SetPostCompleted(){
            Inertia.post(route('public.blog.post.completed', this.post.id), null, { preserveScroll: true });
        }
    }
}
</script>



