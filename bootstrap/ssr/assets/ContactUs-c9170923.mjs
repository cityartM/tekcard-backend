import { jsx, jsxs } from "react/jsx-runtime";
import { useForm, Head } from "@inertiajs/react";
import { L as LandingLayout } from "./LandingLayout-a09f7ab0.mjs";
const InputLabel = ({ value, className = "", children, ...props }) => {
  return /* @__PURE__ */ jsx("label", { ...props, className: `capitalize text-[1.25rem] font-medium text-[#606060] ` + className, children: value ? value : children });
};
const TextArea = ({ className = "", rows = 3, children, ...props }) => {
  return /* @__PURE__ */ jsx(
    "textarea",
    {
      ...props,
      rows,
      className: "text-[1.25rem] border border-gray-300 rounded-2xl shadow-sm p-8 focus:outline-none focus:ring-1 focus:ring-[#2273AF] focus:border-[#2273AF]" + className,
      children
    }
  );
};
function InputError({ message, className = "", ...props }) {
  return message ? /* @__PURE__ */ jsx("p", { ...props, className: "text-sm text-red-600 " + className, children: message }) : null;
}
const TextInput = ({ type = "text", className = "", ...props }) => {
  return /* @__PURE__ */ jsx(
    "input",
    {
      ...props,
      type,
      className: "text-[1.25rem] px-8 py-4 border border-gray-300 rounded-2xl shadow-sm focus:outline-none focus:ring-1 focus:ring-[#2273AF] focus:border-[#2273AF] " + className
    }
  );
};
const fields = [
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
    name: "company",
    type: "text",
    label: "Company *",
    placeholder: "Enter your company"
  },
  {
    name: "subject",
    type: "text",
    label: "Subject *",
    placeholder: "How can we Help"
  },
  {
    name: "message",
    type: "textarea",
    label: "Message",
    placeholder: "Hello there,I would like to talk about how to..."
  }
];
const ContactForm = ({}) => {
  const { data, setData, post, processing, errors, reset } = useForm({
    name: "",
    email: "",
    company: "",
    subject: "",
    message: ""
  });
  const handleSubmit = (e) => {
    e.preventDefault();
    post(route("landing.contact-us.submit"), {
      preserveScroll: true,
      onSuccess: () => {
        reset("name", "email", "company", "subject", "message");
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
    fields.map((field) => {
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
    /* @__PURE__ */ jsx("div", { className: "flex items-center justify-center gap-8", children: /* @__PURE__ */ jsx("button", { disabled: processing, type: "submit", className: "bg-[#478DCB] text-white font-medium text-lg py-4 px-10 rounded-2xl shadow-md hover:bg-[#29A0F5] transition duration-300 ease-in-out", children: "Send Message" }) })
  ] }) });
};
const ContactForm$1 = ContactForm;
function ContactUs({}) {
  return /* @__PURE__ */ jsxs(LandingLayout, { children: [
    /* @__PURE__ */ jsx(Head, { title: "Welcome" }),
    /* @__PURE__ */ jsx("div", { className: "mx-auto max-w-7xl", children: /* @__PURE__ */ jsxs("div", { className: "py-28 space-y-20", children: [
      /* @__PURE__ */ jsx("div", { className: "flex items-center justify-center", children: /* @__PURE__ */ jsx("h1", { className: "text-center text-[4rem] text-[#2273AF] font-bold leading-snug", children: "Contact Us" }) }),
      /* @__PURE__ */ jsxs("div", { className: "grid grid-cols-1 md:grid-cols-2 gap-12 items-center", children: [
        /* @__PURE__ */ jsxs("div", { className: "space-y-16", children: [
          /* @__PURE__ */ jsxs("div", { className: "space-y-6", children: [
            /* @__PURE__ */ jsx("h2", { className: "text-[4rem] text-[#2273AF] font-bold leading-snug", children: "Is Tekcard the right platform for your community?" }),
            /* @__PURE__ */ jsx("p", { className: "text-[1.375rem] text-[#2273AF] font-normal leading-snug tracking-wide", children: "Just answer a few questions so that we can personalize the right experience for you." })
          ] }),
          /* @__PURE__ */ jsxs("div", { className: "px-8 divide-y devide-[#CFCFCF] bg-white rounded-3xl shadow-2xl", children: [
            /* @__PURE__ */ jsx("div", { className: "py-6", children: /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-10", children: [
              /* @__PURE__ */ jsxs("div", { className: "flex-grow flex items-center gap-6", children: [
                /* @__PURE__ */ jsxs("svg", { className: "w-16 h-16", viewBox: "0 0 83 84", fill: "none", xmlns: "http://www.w3.org/2000/svg", children: [
                  /* @__PURE__ */ jsx("rect", { y: "0.5", width: "83", height: "83", rx: "20", fill: "#478DCB" }),
                  /* @__PURE__ */ jsx(
                    "path",
                    {
                      d: "M18 36.5L40.5 45.1207L63 36.5V51.5C63 57.0228 58.5228 61.5 53 61.5H28C22.4772 61.5 18 57.0228 18 51.5V36.5Z",
                      fill: "#44C8EF"
                    }
                  ),
                  /* @__PURE__ */ jsx(
                    "path",
                    {
                      d: "M18 33.5C18 27.9772 22.4772 23.5 28 23.5H53C58.5228 23.5 63 27.9772 63 33.5V33.8636L40.5 42.5L18 33.8636V33.5Z",
                      fill: "white"
                    }
                  )
                ] }),
                /* @__PURE__ */ jsx("p", { className: "text-xl font-bold text-[#2273AF]", children: "Mail Us" })
              ] }),
              /* @__PURE__ */ jsx("p", { className: "flex-shrink-0 text-lg font-semibold text-gray-600", children: "Techcard@mail.com" })
            ] }) }),
            /* @__PURE__ */ jsx("div", { className: "py-6", children: /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-10", children: [
              /* @__PURE__ */ jsxs("div", { className: "flex-grow flex items-center gap-6", children: [
                /* @__PURE__ */ jsxs("svg", { className: "w-16 h-16", viewBox: "0 0 83 84", fill: "none", children: [
                  /* @__PURE__ */ jsx("rect", { y: "0.5", width: "83", height: "83", rx: "20", fill: "#44C8EF" }),
                  /* @__PURE__ */ jsx(
                    "path",
                    {
                      d: "M21.0699 31.5158C21.0839 31.5944 21.0952 31.673 21.0999 31.7523C21.1592 32.7695 21.9282 40.8854 31.5962 50.7673C31.5962 50.7673 39.9477 59.2782 48.7374 61.0676C48.7754 61.0755 48.8128 61.084 48.8508 61.0945C49.383 61.2392 53.9075 62.3828 56.2398 60.0439L59.5626 56.7807C59.5926 56.7512 59.6239 56.7224 59.6559 56.6949C59.9874 56.41 62.295 54.278 59.9867 52.0111C57.6504 49.7167 54.7052 46.9192 54.3717 46.6022C54.3557 46.5871 54.3404 46.5721 54.3251 46.5563C54.1443 46.3716 52.4276 44.7106 50.4168 46.2282C50.3587 46.2721 50.304 46.3212 50.252 46.3723L46.9987 49.5758C46.2697 50.2668 45.1119 50.2577 44.3936 49.5555L33.2789 38.6821C32.5326 37.9517 32.552 36.759 33.3216 36.0523L35.9227 33.6655C35.9227 33.6655 38.7726 31.0744 35.712 28.2756L31.1687 23.8138C31.1407 23.7863 31.114 23.7581 31.0874 23.7287C30.7939 23.4038 28.6163 21.1794 26.0613 23.6553C25.9832 23.7306 25.8985 23.7987 25.8085 23.859C24.9415 24.4433 20.3849 27.7077 21.0699 31.5158Z",
                      fill: "white"
                    }
                  ),
                  /* @__PURE__ */ jsx(
                    "path",
                    {
                      d: "M51.6928 39.4644C52.3964 39.4641 52.9758 38.8905 52.8762 38.1939C52.7531 37.3338 52.5058 36.4938 52.1402 35.7006C51.5962 34.5206 50.8032 33.4724 49.8156 32.628C48.828 31.7836 47.6693 31.163 46.4191 30.809C45.5788 30.571 44.7105 30.4573 43.8417 30.4693C43.1381 30.4791 42.6615 31.1406 42.7705 31.8358C42.8795 32.531 43.5348 32.9929 44.2378 33.0224C44.7397 33.0435 45.2387 33.1232 45.7248 33.2608C46.621 33.5146 47.4516 33.9595 48.1596 34.5648C48.8676 35.1701 49.4361 35.9215 49.826 36.7674C50.0375 37.2262 50.1938 37.7069 50.2926 38.1993C50.431 38.8892 50.9891 39.4648 51.6928 39.4644Z",
                      fill: "white"
                    }
                  ),
                  /* @__PURE__ */ jsx(
                    "path",
                    {
                      d: "M56.9542 39.609C57.8018 39.6753 58.552 39.0404 58.5203 38.1908C58.4627 36.6455 58.1367 35.118 57.5531 33.6776C56.7762 31.7602 55.5642 30.0498 54.0128 28.6814C52.4613 27.3129 50.6129 26.324 48.6136 25.7926C47.1116 25.3935 45.5553 25.2608 44.0149 25.3966C43.168 25.4712 42.6318 26.2948 42.8034 27.1275C42.9751 27.9602 43.7906 28.4837 44.6396 28.4384C45.7082 28.3814 46.7824 28.4917 47.8228 28.7682C49.3608 29.1769 50.7827 29.9377 51.9762 30.9903C53.1696 32.043 54.102 33.3588 54.6996 34.8337C55.1038 35.8314 55.3474 36.8835 55.4242 37.9509C55.4853 38.7989 56.1066 39.5426 56.9542 39.609Z",
                      fill: "white"
                    }
                  )
                ] }),
                /* @__PURE__ */ jsx("p", { className: "text-xl font-bold text-[#2273AF]", children: "Call Us" })
              ] }),
              /* @__PURE__ */ jsx("p", { className: "flex-shrink-0 text-lg font-semibold text-gray-600", children: "(012)345-6789" })
            ] }) })
          ] })
        ] }),
        /* @__PURE__ */ jsx("div", { className: "col-span-full md:col-span-1 py-20 px-16 bg-white rounded-3xl", children: /* @__PURE__ */ jsx(ContactForm$1, {}) })
      ] })
    ] }) })
  ] });
}
export {
  ContactUs as default
};
