<template>
  <div>
    <h1>Schedule Appointment</h1>
    <form @submit.prevent="scheduleAppointment">
      <div>
        <label for="name">Name:</label>
        <input type="text" v-model="name" required />
      </div>
      <div>
        <label for="date">Date:</label>
        <input type="date" v-model="date" required />
      </div>
      <div>
        <label for="time">Time:</label>
        <input type="time" v-model="time" required />
      </div>
      <div>
        <label for="doctor">Doctor:</label>
        <select v-model="doctorId" required>
          <option v-for="doctor in doctors" :key="doctor.id" :value="doctor.id">
            {{ doctor.name }}
          </option>
        </select>
      </div>
      <button type="submit">Schedule</button>
    </form>
    <p v-if="message">{{ message }}</p>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      name: '',
      date: '',
      time: '',
      doctorId: null,
      doctors: [],
      message: '',
      url: 'http://127.0.0.1:8000/api/',
    };
  },
  created() {
    this.loadDoctors();
  },
  methods: {
    async loadDoctors() {
      try {
        const response = await axios.get(this.url + 'doctors');
        this.doctors = response.data;
      } catch (error) {
        console.error('Error loading doctors:', error);
      }
    },
    async scheduleAppointment() {
      try {
        await axios.post(this.url + 'available-dates', {
          doctor_id: this.doctorId,
          date: this.date,
          time: this.time
        });
        this.message = 'Appointment scheduled successfully!';
      } catch (error) {
        this.message = 'Error scheduling appointment: ' + error.response.data.message;
      }
    }
  }
};
</script>

<style>

</style>
