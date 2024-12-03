<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";

const router = useRouter();
const newStudent = ref({ name: "", age: "", email: "", image: "" });

const addStudent = async () => {
  try {
    await axios.post("http://localhost:3000/students", {
      name: newStudent.name.value,
      age: newStudent.age.value,
      email: newStudent.email.value,
      image: newStudent.image.value,
    });
    alert("them sv thanh cong");
    router.push("/");
  } catch (err) {
    alert("them sv that bai " + err.message);
  }
};
</script>
<script setup>
import { ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import axios from "axios";

const route = useRoute();
const router = useRouter();

const editingStudent = ref({});

const fetchStudent = async () => {
  try {
    const response = await axios.get(
      `http://localhost:3000/students/${route.params.id}`
    );
    editingStudent.value = response.data;
  } catch (err) {
    alert("Loi khi lay du lieu :" + err.message);
  }
};
const updateStudent = async () => {
  try {
    const response = await axios.put(
      `http://localhost:3000/students/${route.params.id}`,
      editingStudent.value
    );
    alert("Cap nhat sinh vien thanh cong");
    router.push("/");
  } catch (error) {
    alert("Loi khi lay du lieu :" + err.message);
  }
};
onMounted(fetchStudent);
</script>
