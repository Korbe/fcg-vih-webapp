<template>
    <audio v-if="source" :id="id" ref="audio" @timeupdate="updateTime">
        <source :src="source" type="audio/mp3" />
        Your browser does not support the audio tag.
    </audio>

    <template v-if="false">
        <!-- Div that plays song, onclick calls the javascript play function and passes the
        id of the audio tag with the appropriate song -->
        <div id="songPlay" @click="play(audio_id)">Play</div>
        <!-- Div that pauses the song when clicked.  Calls the pause button when clicked. -->
        <div id="songPause" @click="pause()">Pause</div>
        <!-- Div that switches rather or not to play or pause the song based off of song state -->
        <div id="songPlayPause" @click="playPause(audio_id)">PlayPause</div>
        <!-- Div that stops the song when clicked -->
        <div id="songStop" @click="stopSong()">Stop</div>
        <!-- Div that updates with current song time while playing -->
        <div id="volumeUp" @click="changeVolume(10, 'up')">Plus</div>
        <br>
        <div id="volumeDown" @click="changeVolume(10, 'down')">Minus</div>
        <!-- Volume Meter sets the new volume on click. The Volume Status div is embedded inside so it can grow
        within bounds to simulate percentage feel -->
        <div id="volumeMeter" @click="setNewVolume(this)">
            <div id="volumeStatus"></div>
        </div>
        <span id="volumeThirty" @click="volumeUpdate(30)">VOLUME 30</span>
        <span id="volumeSixty" @click="volumeUpdate(60)">VOLUME 60</span>
        <span id="volumeNinety" @click="volumeUpdate(90)">VOLUME 90</span>
        <!-- Song Slider tracks progress on song time change, if you click it sets the distance into the song
        based on the percentage of where was clicked -->
        <div id="songSlider2" @click="setSongPosition(this)">
            <div id="trackProgress2"></div>
        </div>
    </template>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';

// Props
const props = defineProps({
    id: String,
    source: Object,
});

// Refs
const audioRef = ref(null);
const songTime = ref('0:00 / 0:00');
const paused = ref(false);

// Computed Property for Audio ID
const audio_id = computed(() => props.id);

// Lifecycle Hook: onMounted
onMounted(() => {
    audioRef.value = document.getElementById(audio_id.value);
});

// Methods
const addSeconds = (sec) => {
    if (audioRef.value) {
        audioRef.value.currentTime += sec;
    }
};

const playPause = () => {
    if (audioRef.value.paused) {
        sendSongUpdate(); // TODO: Implement this method if needed
        audioRef.value.play();
        paused.value = false;
    } else {
        audioRef.value.pause();
        paused.value = true;
    }
};

const updateTime = () => {
    if (!audioRef.value) return;

    const { currentTime, duration } = audioRef.value;
    const currentSeconds = (Math.floor(currentTime % 60) < 10 ? '0' : '') + Math.floor(currentTime % 60);
    const currentMinutes = Math.floor(currentTime / 60);
    const durationMinutes = Math.floor(duration / 60);
    const durationSeconds = (Math.floor(duration % 60) < 10 ? '0' : '') + Math.floor(duration % 60);

    songTime.value = `${currentMinutes}:${currentSeconds} / ${durationMinutes}:${durationSeconds}`;

    // Update slider percentage (for visual feedback)
    const percentageOfSong = currentTime / duration;
};

const sendSongUpdate = () => {
    // Emit the song update event if needed
    // this.$emit('update-song', this.index);
};

// Additional methods for volume, song position, etc.
const changeVolume = (amount, direction) => {
    if (!audioRef.value) return;

    const currentVolume = audioRef.value.volume;
    const newVolume = direction === 'up' ? currentVolume + amount / 100 : currentVolume - amount / 100;
    audioRef.value.volume = Math.max(0, Math.min(newVolume, 1)); // Keep volume between 0 and 1
};

const setSongPosition = (event) => {
    if (!audioRef.value) return;

    const { offsetX, target } = event;
    const songPosition = (offsetX / target.clientWidth) * audioRef.value.duration;
    audioRef.value.currentTime = songPosition;
};

// Example of volume preset buttons
const volumeUpdate = (volume) => {
    if (audioRef.value) {
        audioRef.value.volume = volume / 100;
    }
};
</script>
