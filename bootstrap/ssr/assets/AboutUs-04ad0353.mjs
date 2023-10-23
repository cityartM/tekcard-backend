import { jsxs, jsx } from "react/jsx-runtime";
import { Head, usePage } from "@inertiajs/react";
import { L as LandingLayout } from "./LandingLayout-9a0f5d69.mjs";
import { u as useFaqs, F as Faq } from "./Faq-e10c77d7.mjs";
import "react";
import "@headlessui/react";
import "@heroicons/react/24/outline";
const LogoBig = "/build/assets/logo-big-b61f8c98.png";
function AboutUs({}) {
  return /* @__PURE__ */ jsxs(LandingLayout, { children: [
    /* @__PURE__ */ jsx(Head, { title: "Welcome" }),
    /* @__PURE__ */ jsxs(Section, { children: [
      /* @__PURE__ */ jsx("div", { className: "mt-20 text-center text-7xl font-extrabold text-[#2273AF]", children: "About us" }),
      /* @__PURE__ */ jsxs("div", { className: "mt-20", children: [
        /* @__PURE__ */ jsx("div", { className: "mx-auto max-w-5xl text-5xl font-bold text-center text-slate-700", children: "We aim to help people strengthen relationships and amplify the power of their network." }),
        /* @__PURE__ */ jsx("div", { className: "mx-auto max-w-7xl", children: /* @__PURE__ */ jsx("img", { src: LogoBig, alt: "about logo", className: "w-full" }) }),
        /* @__PURE__ */ jsxs("div", { className: "mx-auto max-w-5xl prose-xl", children: [
          /* @__PURE__ */ jsx("p", { children: `Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum been the industry's standard dummy text ever since the 1500s, when an unknown printegalley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.` }),
          /* @__PURE__ */ jsx("h2", { children: "The Story Behind Tekcard" }),
          /* @__PURE__ */ jsx("p", { children: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum been the industry's standard dummy text ever since the 1500s, when an unknown printegalley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting." }),
          /* @__PURE__ */ jsxs("ul", { children: [
            /* @__PURE__ */ jsx("li", { children: "Efficiently myocardinate market-driven innovation." }),
            /* @__PURE__ */ jsx("li", { children: "Idea - sharing with back end products." }),
            /* @__PURE__ */ jsx("li", { children: "Ballpark value added activity to beta test." })
          ] }),
          /* @__PURE__ */ jsx("blockquote", { className: "border-l-[1.5rem] rtl:border-r-[1.5rem] border-sky-900 p-10 text-3xl font-bold text-gray-800 leading-normal", children: `"Our team was able to teach themselves primchat in a day.it's like using a shared email inboxust way more robust looking . Primchat was the modern what we were looking."` }),
          /* @__PURE__ */ jsx("h2", { children: "Tekcard Co-founders" }),
          /* @__PURE__ */ jsx("p", { children: "remaining essentially unchanged. It was popularised in the 1960s with the release of Letrsheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum." }),
          /* @__PURE__ */ jsxs("ol", { children: [
            /* @__PURE__ */ jsx("li", { children: "Efficiently myocardinate market-driven innovation." }),
            /* @__PURE__ */ jsx("li", { children: "Idea - sharing with back end products." }),
            /* @__PURE__ */ jsx("li", { children: "Ballpark value added activity to beta test." }),
            /* @__PURE__ */ jsx("li", { children: "Voluptate at dolores ut dolor" })
          ] })
        ] })
      ] })
    ] }),
    /* @__PURE__ */ jsx(FaqsSection, {})
  ] });
}
const Section = ({ children, className }) => {
  return /* @__PURE__ */ jsx("div", { className: `min-h-screen h-full flex flex-col ${className}`, children: /* @__PURE__ */ jsx("div", { className: "flex-1 py-24 mx-auto max-w-7xl w-full min-h-full", children }) });
};
const FaqsSection = () => {
  const locale = usePage().props.locale;
  const { faqs } = useFaqs(locale);
  return /* @__PURE__ */ jsx(Section, { children: /* @__PURE__ */ jsxs("div", { className: "max-w-2xl mx-auto", children: [
    /* @__PURE__ */ jsx("div", { className: "mt-16 text-center text-7xl font-extrabold text-[#2273AF]", children: `Frequently Asked Questions` }),
    /* @__PURE__ */ jsx("div", { className: "mt-12", children: faqs && /* @__PURE__ */ jsx(Faqs, { Faqs: faqs }) })
  ] }) });
};
const Faqs = ({ Faqs: Faqs2 }) => {
  return /* @__PURE__ */ jsx("div", { className: "flex flex-col space-y-10", children: Faqs2.map((faq) => /* @__PURE__ */ jsx(Faq, { Faq: faq }, faq.number)) });
};
export {
  AboutUs as default
};
