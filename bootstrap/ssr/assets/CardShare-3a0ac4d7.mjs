import { jsxs, jsx } from "react/jsx-runtime";
import { usePage, Head } from "@inertiajs/react";
import { A as AppstoreImage, P as PlaystoreImage } from "./playstore1-e6298e83.mjs";
function Home({}) {
  const props = usePage().props;
  props.locale;
  const card = props.card.data;
  console.log(card);
  return /* @__PURE__ */ jsxs("div", { children: [
    /* @__PURE__ */ jsx(Head, { title: "Welcome" }),
    /* @__PURE__ */ jsx("div", { className: "bg-white", children: /* @__PURE__ */ jsxs("div", { className: "flex flex-col", children: [
      /* @__PURE__ */ jsx("div", { className: "mb-6 md:mb-12", children: /* @__PURE__ */ jsx(Card, { card }) }),
      /* @__PURE__ */ jsx("div", { className: "fixed inset-x-0 bottom-0 z-20 flex-shrink-0 bg-white border border-gray-500 rounded-t-lg drop-shadow-lg", children: /* @__PURE__ */ jsxs("div", { className: "py-4 md:py-6 flex items-center justify-center gap-10", children: [
        /* @__PURE__ */ jsx("a", { href: data.playstore.url, className: "h-10 md:h-12", children: /* @__PURE__ */ jsx("img", { className: "h-full w-full object-contain", src: data.playstore.image, alt: "playstore" }) }),
        /* @__PURE__ */ jsx("a", { href: data.appstore.url, className: "h-10 md:h-12", children: /* @__PURE__ */ jsx("img", { className: "h-full w-full object-contain", src: data.appstore.image, alt: "appstore" }) })
      ] }) })
    ] }) })
  ] });
}
const data = {
  appstore: {
    url: "#",
    image: AppstoreImage
  },
  playstore: {
    url: "#",
    image: PlaystoreImage
  }
};
function Card({ card }) {
  return /* @__PURE__ */ jsxs("div", { className: "relative", children: [
    /* @__PURE__ */ jsxs("div", { className: "h-[30vh] w-full", children: [
      (card == null ? void 0 : card.background) && /* @__PURE__ */ jsx("img", { className: "w-full h-full object-cover", src: card == null ? void 0 : card.background.background, alt: "cover" }),
      (card == null ? void 0 : card.color) && /* @__PURE__ */ jsx("div", { className: "w-full h-full", style: { background: card == null ? void 0 : card.color } })
    ] }),
    /* @__PURE__ */ jsxs("div", { className: "-translate-y-16 px-4 max-w-lg mx-auto", children: [
      /* @__PURE__ */ jsxs("div", { className: "flex flex-col items-center justify-center", children: [
        /* @__PURE__ */ jsx(
          "img",
          {
            className: "w-32 h-32 object-cover rounded-full overflow-hidden ring-4 ring-offset-2 ring-offset-slate-50 ring-sky-500 shadow-lg",
            src: card == null ? void 0 : card.card_avatar,
            alt: "avatar"
          }
        ),
        /* @__PURE__ */ jsx("div", { className: "mt-6 text-2xl text-[#2273AF] font-bold", children: card == null ? void 0 : card.full_name }),
        /* @__PURE__ */ jsx("div", { className: "text-base text-[#9CA3AF]", children: card == null ? void 0 : card.job_title })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "mt-10", children: [
        /* @__PURE__ */ jsx("div", { className: "text-base text-[#2273AF] font-bold", children: "Social Media" }),
        /* @__PURE__ */ jsx("div", { className: "p-4 grid grid-cols-4 gap-4", children: card == null ? void 0 : card.card_apps.map((item, index) => {
          var _a, _b;
          return /* @__PURE__ */ jsx("div", { className: "flex justify-center items-center", children: /* @__PURE__ */ jsx("a", { href: (_a = item.contact) == null ? void 0 : _a.base_url, children: /* @__PURE__ */ jsx("div", { className: "w-16 h-16 p-3 bg-gray-200 rounded-lg shadow", style: { background: card == null ? void 0 : card.color }, children: /* @__PURE__ */ jsx("img", { className: "w-10 h-10", src: (_b = item.contact) == null ? void 0 : _b.icon, alt: "instagram" }) }) }) }, index);
        }) })
      ] })
    ] })
  ] });
}
export {
  Home as default
};
