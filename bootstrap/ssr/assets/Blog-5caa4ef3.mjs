import { jsxs, jsx } from "react/jsx-runtime";
import { Head } from "@inertiajs/react";
import { L as LandingLayout } from "./LandingLayout-aafbec72.mjs";
import "react";
import "@headlessui/react";
import "@heroicons/react/24/outline";
function Blog({}) {
  return /* @__PURE__ */ jsxs(LandingLayout, { children: [
    /* @__PURE__ */ jsx(Head, { title: "Welcome" }),
    /* @__PURE__ */ jsx("div", { className: "text-3xl", children: "Blog" })
  ] });
}
export {
  Blog as default
};
