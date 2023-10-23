import { jsx, jsxs } from "react/jsx-runtime";
import { useForm } from "@inertiajs/react";
import { I as InputLabel, T as TextArea, a as InputError } from "./InputError-fd9726b2.mjs";
import { T as TextInput } from "./Input-15127deb.mjs";
import { A as AuthConfig } from "./AuthConfig-f672b007.mjs";
const LoginForm = ({}) => {
  const {
    data,
    setData,
    post,
    processing,
    errors,
    reset
  } = useForm(AuthConfig.default_login_state);
  const handleSubmit = (e) => {
    e.preventDefault();
    post(AuthConfig.loginUri, {
      preserveScroll: true,
      onSuccess: () => {
        AuthConfig.loginFields.forEach((field) => {
          reset(field);
        });
        alert("Message sent successfully!");
      },
      onError: () => {
        alert("Message failed to send!");
      }
    });
  };
  const handleChanges = (e) => {
    setData(e.target.id, e.target.value);
  };
  return /* @__PURE__ */ jsx("form", { onSubmit: (event) => handleSubmit(event), children: /* @__PURE__ */ jsxs("div", { className: "flex flex-col space-y-10", children: [
    AuthConfig.fields.login.map((field) => {
      if (field.type === "textarea") {
        return /* @__PURE__ */ jsxs("div", { className: "flex flex-col space-y-4", children: [
          /* @__PURE__ */ jsx(InputLabel, { htmlFor: field.name, value: field.label }),
          /* @__PURE__ */ jsx(
            TextArea,
            {
              id: field.name,
              ...field,
              value: data[field.name],
              onChange: (e) => handleChanges(e)
            }
          ),
          errors[field.name] && /* @__PURE__ */ jsx(InputError, { message: errors[field.name] })
        ] }, field.name);
      } else {
        return /* @__PURE__ */ jsxs("div", { className: "flex flex-col space-y-4", children: [
          /* @__PURE__ */ jsx(InputLabel, { htmlFor: field.name, value: field.label }),
          /* @__PURE__ */ jsx(
            TextInput,
            {
              id: field.name,
              ...field,
              value: data[field.name],
              onChange: (e) => handleChanges(e)
            }
          ),
          errors[field.name] && /* @__PURE__ */ jsx(InputError, { message: errors[field.name] })
        ] }, field.name);
      }
    }),
    /* @__PURE__ */ jsx("div", { className: "flex items-center justify-center gap-8", children: /* @__PURE__ */ jsx("button", { disabled: processing, type: "submit", className: "flex-grow bg-[#478DCB] text-white font-medium text-lg py-4 px-10 rounded-2xl shadow-md hover:bg-[#29A0F5] transition duration-300 ease-in-out", children: "Submit" }) })
  ] }) });
};
export {
  LoginForm as L
};
