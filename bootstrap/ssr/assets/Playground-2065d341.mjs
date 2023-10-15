import { jsx, Fragment } from "react/jsx-runtime";
import { F as Faq } from "./Faq-b8d8b6c8.mjs";
import "react";
const Page = ({}) => {
  return /* @__PURE__ */ jsx(Fragment, { children: /* @__PURE__ */ jsx("div", { className: "py-20 bg-white min-h-screen h-full flex flex-col items-center justify-center", children: /* @__PURE__ */ jsx("div", { className: "max-w-xl", children: /* @__PURE__ */ jsx(Faqs, { Faqs: FaqsData }) }) }) });
};
const Faqs = ({ Faqs: Faqs2 }) => {
  return /* @__PURE__ */ jsx("div", { className: "flex flex-col space-y-10", children: Faqs2.map((faq) => /* @__PURE__ */ jsx(Faq, { Faq: faq })) });
};
const FaqsData = [
  {
    number: 1,
    question: "What is a digital business card?",
    answer: `Digital business cards are used by both individuals and businesses to quickly and sustainably exchange contact information. They’re more engaging, cost-effective, and eco-friendly than traditional physical business cards. Digital cards are also known as virtual, electronic, and—in some cases—NFC business cards.
How do I share my business cards?`
  },
  {
    number: 2,
    question: "How can I make a digital business card for free?",
    answer: ``
  },
  {
    number: 3,
    question: "How do I share my business cards?",
    answer: ``
  },
  {
    number: 4,
    question: "What is an NFC business card?",
    answer: ``
  },
  {
    number: 5,
    question: "What is the benefit of a digital card?",
    answer: ``
  }
];
export {
  Page as default
};
