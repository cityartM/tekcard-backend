import { jsxs, jsx } from "react/jsx-runtime";
import { Head, usePage } from "@inertiajs/react";
import { L as LandingLayout } from "./LandingLayout-a09f7ab0.mjs";
import { F as Faq } from "./Faq-b8d8b6c8.mjs";
import { u as useFaqs } from "./Faq-589e9e94.mjs";
import "react";
function AboutUs({}) {
  return /* @__PURE__ */ jsxs(LandingLayout, { children: [
    /* @__PURE__ */ jsx(Head, { title: "Welcome" }),
    /* @__PURE__ */ jsx(FaqsSection, {})
  ] });
}
const FaqsSection = () => {
  const locale = usePage().props.locale;
  const { faqs } = useFaqs(locale);
  return /* @__PURE__ */ jsxs("section", { className: "max-w-2xl mx-auto py-20", children: [
    /* @__PURE__ */ jsx("div", { className: "max-w-md mx-auto flex justify-center", children: /* @__PURE__ */ jsx("h2", { className: "text-center font-bold tracking-wide leading-[4.5rem] text-5xl text-sky-400", children: `Frequently Ask Questions (${locale})` }) }),
    /* @__PURE__ */ jsx("div", { className: "mt-12", children: faqs && /* @__PURE__ */ jsx(Faqs, { Faqs: faqs }) })
  ] });
};
const Faqs = ({ Faqs: Faqs2 }) => {
  return /* @__PURE__ */ jsx("div", { className: "flex flex-col space-y-10", children: Faqs2.map((faq) => /* @__PURE__ */ jsx(Faq, { Faq: faq }, faq.number)) });
};
export {
  AboutUs as default
};
