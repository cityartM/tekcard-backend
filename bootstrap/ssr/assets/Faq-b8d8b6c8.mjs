import { jsxs, jsx } from "react/jsx-runtime";
import { useState } from "react";
const Faq = ({ Faq: Faq2 }) => {
  const [isOpen, setIsOpen] = useState(false);
  return /* @__PURE__ */ jsxs("div", { className: "w-full border-2 border-sky-400 rounded-lg overflow-hidden", children: [
    /* @__PURE__ */ jsx(FaqHeader, { faq: Faq2, isOpen, setIsOpen }),
    /* @__PURE__ */ jsx(FaqContent, { faq: Faq2, isOpen })
  ] });
};
const FaqHeader = ({ faq, isOpen, setIsOpen }) => {
  return /* @__PURE__ */ jsxs("div", { className: `w-full flex items-stretch ${isOpen ? "border-b-2 border-sky-400" : ""} `, children: [
    /* @__PURE__ */ jsxs("div", { className: "flex-grow px-10 py-6 flex items-center gap-10", children: [
      /* @__PURE__ */ jsx("span", { className: "flex-shrink-0", children: faq.number }),
      /* @__PURE__ */ jsx("p", { className: "flex-grow text-base font-semibold tracking-wide", children: faq.question })
    ] }),
    /* @__PURE__ */ jsx(FaqExpandButton, { faq, isOpen, setIsOpen })
  ] });
};
const FaqContent = ({ faq, isOpen }) => {
  return /* @__PURE__ */ jsx("div", { className: `${!isOpen ? "hidden" : ""} px-16 py-8`, children: /* @__PURE__ */ jsx("p", { className: "text-lg font-normal tracking-wide leading-10", children: faq.answer }) });
};
const FaqExpandButton = ({ faq, isOpen, setIsOpen }) => {
  return /* @__PURE__ */ jsx("button", { onClick: (e) => setIsOpen(!isOpen), className: "flex-shrink-0 w-20 text-xl font-bold text-white bg-sky-400", children: isOpen ? /* @__PURE__ */ jsx("span", { children: `-` }) : /* @__PURE__ */ jsx("span", { children: `+` }) });
};
export {
  Faq as F
};
