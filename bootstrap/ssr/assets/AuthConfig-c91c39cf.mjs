const Loginfields = [
  {
    name: "email",
    type: "email",
    label: "Your email *",
    placeholder: "Enter your email"
  },
  {
    name: "password",
    type: "password",
    label: "Password *",
    placeholder: "***********"
  }
];
const Registerfields = [
  {
    name: "name",
    type: "text",
    label: "Full name *",
    placeholder: "Enter your name"
  },
  {
    name: "email",
    type: "email",
    label: "Your email *",
    placeholder: "Enter your email"
  },
  {
    name: "password",
    type: "password",
    label: "Password *",
    placeholder: "***********"
  },
  {
    name: "password_confirmation",
    type: "password",
    label: "Confirm Password *",
    placeholder: "***********"
  }
];
const AuthConfig = {
  loginUri: route("landing.login"),
  registerUri: "http://localhost:8000/api/register",
  logoutUri: "http://localhost:8000/api/logout",
  fields: {
    login: Loginfields,
    register: Registerfields
  },
  default_login_state: {
    email: "",
    password: ""
  },
  default_register_state: {
    name: "",
    email: "",
    password: "",
    password_confirmation: ""
  },
  loginFields: ["email", "password"],
  registerFields: ["name", "email", "password", "password_confirmation"]
};
export {
  AuthConfig as A
};
