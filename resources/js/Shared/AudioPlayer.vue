<template>
    <audio v-if="source" :id="id" ref="audio" @timeupdate="updateTime">
            <source :src="source" type="audio/mp3"/>
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
</template>

<script>

export default {
    name: 'audio-player',
    props: {
        id: String,
        source: Object,
    },
    mounted(){
        this.audioRef = this.$refs.audio;
    },
    data() {
        audioRef: null
    },
    methods: {
        addSeconds(sec) {
            this.audioRef.currentTime += sec;
        },
        //Does a switch of the play/pause with one button.
        playPause() {
            
            //Checks to see if the song is paused, if it is, play it from where it left off otherwise pause it.
            if (this.audioRef.paused) {
                this.sendSongUpdate();//TODO
                this.audioRef.play();
                this.paused = false;
            } else {
                this.audioRef.pause();
                this.paused = true;
            }
        },
        //Updates the current time function so it reflects where the user is in the song.
        //This function is called whenever the time is updated.  This keeps the visual in sync with the actual time.
        updateTime() {

            let { currentTime, duration } = this.audioRef;

            let currentSeconds = (Math.floor(currentTime % 60) < 10 ? '0' : '') + Math.floor(currentTime % 60);
            let currentMinutes = Math.floor(currentTime / 60);
            //Sets the current song location compared to the song duration.
            this.songTime = currentMinutes + ":" + currentSeconds + ' / ' + Math.floor(duration / 60) + ":" + (Math.floor(duration % 60) < 10 ? '0' : '') + Math.floor(duration % 60);

            //Fills out the slider with the appropriate position.
            let percentageOfSong = (currentTime / duration);
        },
        sendSongUpdate(){
            //this.$emit('update-song', this.index);
        },
    }


}
</script>