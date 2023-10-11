import './bootstrap';

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.data('gallery_form', ({state, lang, ...rest}) => ({

  api_base_url: 'http://localhost:8000/api',
  delete_url: '#',
  upload_url: `http://localhost:8000/translations/${lang}/gallery`,

  lang: lang,
  files: [],

  async addFile(event) {
    const fileInput = event.target;
    const file = fileInput.files[0];

    if (!file) return;

    // Create a FormData object to send the file
    const formData = new FormData();
    formData.append('file', file);

    try {
      const response = await axios.post(this.upload_url, formData, {
        headers: {
          'Content-Type': 'multipart/form-data',
        },
        onUploadProgress: (progressEvent) => {
          // Calculate the upload progress percentage
          const percentage = Math.round((progressEvent.loaded / progressEvent.total) * 100);

          // Update the progress percentage for this file
          file.progress = percentage;

          if (percentage === 100) {
            // Upload is complete; you can perform additional actions here
          }
        },
      });

      if (response.status === 200) {
        const result = response.data;
        const filename = result.filename;
        const url = result.url;

        // Add the uploaded file to the files array
        this.files.push({ [filename]: url });

        // Clear the file input
        fileInput.value = '';
      } else {
        // Handle the error
        console.error('File upload failed.');
      }
    } catch (error) {
      console.error('An error occurred:', error);
    }
    },

  removeFile(index) {
    this.files.splice(index, 1);
  },

  submit() {
    console.log(this.files);
  },

  init() {

    console.log(state, rest)

    this.api_base_url = rest.url;
    this.upload_url = rest.upload_url;
    this.delete_url = rest.delete_url;

    this.lang = lang;

    Object.entries(state)
      .forEach(([key, value]) => {
      this.files.push({
        name: key, url:
        value, delete_url:
        this.delete_url
      });
    });

    console.log(this.files);
  }





}));

Alpine.start();
