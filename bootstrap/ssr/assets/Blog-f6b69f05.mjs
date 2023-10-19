import { jsxs, jsx } from "react/jsx-runtime";
import { Head } from "@inertiajs/react";
import { L as LandingLayout } from "./LandingLayout-c1e1ad02.mjs";
function Blog({}) {
  return /* @__PURE__ */ jsxs(LandingLayout, { children: [
    /* @__PURE__ */ jsx(Head, { title: "Welcome" }),
    /* @__PURE__ */ jsx("div", { className: "text-3xl", children: "Blog" })
  ] });
}
export {
  Blog as default
};
