import { jsx } from "react/jsx-runtime";
import { usePage, Head } from "@inertiajs/react";
import { L as LandingLayout } from "./LandingLayout-26bef78b.mjs";
import "react";
import "@headlessui/react";
import "@heroicons/react/24/outline";
function AboutUs() {
  const { page } = usePage().props;
  console.log(page);
  console.log("AboutUs page");
  return /* @__PURE__ */ jsx(LandingLayout, { children: /* @__PURE__ */ jsx(Head, { title: "About Us" }) });
}
export {
  AboutUs as default
};
