import { jsx, jsxs } from "react/jsx-runtime";
import { useState, useEffect } from "react";
import { usePage, Head } from "@inertiajs/react";
import { L as LandingLayout } from "./LandingLayout-26bef78b.mjs";
import { UserIcon, UsersIcon, CheckBadgeIcon } from "@heroicons/react/24/solid";
import "@headlessui/react";
import "@heroicons/react/24/outline";
const usePricing = (plans) => {
  const [filteredPlans, setFilteredPlans] = useState([]);
  const [filters, setFilters] = useState({
    type: "Client",
    billing: "Monthly"
  });
  const handleFilters = (e, filterBy, filter) => {
    e.preventDefault();
    setFilters({
      ...filters,
      [filterBy]: filter
    });
    filterPlans(filters.type, filters.billing);
  };
  const filterPlans = (type = "Client", billing = "Monthly") => {
    const filteredPlans2 = plans.filter((plan) => plan.type === type && plan.duration === billing);
    setFilteredPlans(filteredPlans2);
  };
  if (filteredPlans.length === 0)
    filterPlans();
  console.log(filters, filteredPlans);
  return { filteredPlans, filterPlans, filters, handleFilters };
};
const usePricing$1 = usePricing;
function PrimaryButton({ className = "", disabled, children, ...props }) {
  return /* @__PURE__ */ jsx(
    "button",
    {
      ...props,
      className: `inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ${disabled && "opacity-25"} ` + className,
      disabled,
      children
    }
  );
}
function SecondaryButton({ type = "button", className = "", disabled, children, ...props }) {
  return /* @__PURE__ */ jsx(
    "button",
    {
      ...props,
      type,
      className: `inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 ${disabled && "opacity-25"} ` + className,
      disabled,
      children
    }
  );
}
function Pricing({}) {
  var _a, _b;
  const plans = ((_a = usePage().props) == null ? void 0 : _a.plans) ?? [];
  const features = ((_b = usePage().props) == null ? void 0 : _b.features) ?? [];
  const { filteredPlans, filterPlans, filters, handleFilters } = usePricing$1(plans);
  useEffect(() => {
    filterPlans(filters.type, filters.billing);
  }, [filters]);
  const Button = ({ active = false, ...props }) => {
    return active ? /* @__PURE__ */ jsx(PrimaryButton, { ...props }) : /* @__PURE__ */ jsx(SecondaryButton, { ...props });
  };
  return /* @__PURE__ */ jsxs(LandingLayout, { children: [
    /* @__PURE__ */ jsx(Head, { title: "Welcome" }),
    /* @__PURE__ */ jsxs(Section, { className: "py-20 px-10 justify-center bg-gradient-to-tr to-pink-100 from-white bg-opacity-20", children: [
      /* @__PURE__ */ jsxs("div", { className: "pt-20 grid grid-cols-1 gap-y-10 md:gap-y-16 lg:gap-y-20", children: [
        /* @__PURE__ */ jsx(
          "div",
          {
            className: "text-center text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-[#2273AF]",
            children: "Pricing"
          }
        ),
        /* @__PURE__ */ jsxs(
          "div",
          {
            className: "mx-auto max-w-5xl text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-center text-slate-700",
            children: [
              /* @__PURE__ */ jsx("div", { className: "text-2xl font-bold text-[#2273AF]", children: "Pricing plans for everyone" }),
              /* @__PURE__ */ jsx("div", { className: "text-xl font-bold text-[#2273AF]", children: "Choose the plan that is right for you or your organization." })
            ]
          }
        )
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "mt-20 mx-auto max-w-md", children: [
        /* @__PURE__ */ jsxs("div", { className: "grid grid-cols-1 sm:grid-cols-2 gap-8", children: [
          /* @__PURE__ */ jsxs(Button, { className: "py-4 px-6 flex items-center gap-4", active: filters.type === "Client", onClick: (e) => handleFilters(e, "type", "Client"), children: [
            /* @__PURE__ */ jsx(UserIcon, { className: "h-10 text-[#2273AF]" }),
            /* @__PURE__ */ jsx("span", { className: "text-xl font-semibold", children: "Personal" })
          ] }),
          /* @__PURE__ */ jsxs(Button, { className: "py-4 px-6 flex items-center gap-4", active: filters.type === "Company", onClick: (e) => handleFilters(e, "type", "Company"), children: [
            /* @__PURE__ */ jsx(UsersIcon, { className: "h-10 text-[#2273AF]" }),
            /* @__PURE__ */ jsx("span", { className: "text-xl font-semibold", children: "Company" })
          ] })
        ] }),
        /* @__PURE__ */ jsxs("div", { className: "mt-8 grid grid-cols-1 sm:grid-cols-2 gap-8", children: [
          /* @__PURE__ */ jsx(Button, { className: "py-4 px-6 flex items-center gap-4", active: filters.billing === "Monthly", onClick: (e) => handleFilters(e, "billing", "Monthly"), children: /* @__PURE__ */ jsx("span", { className: "text-xl font-semibold", children: "Monthly" }) }),
          /* @__PURE__ */ jsx(Button, { className: "py-4 px-6 flex items-center gap-4", active: filters.billing === "Yearly", onClick: (e) => handleFilters(e, "billing", "Yearly"), children: /* @__PURE__ */ jsx("span", { className: "text-xl font-semibold", children: "Yearly" }) })
        ] })
      ] }),
      /* @__PURE__ */ jsx("div", { className: "my-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8", children: filteredPlans && filteredPlans.map((plan) => /* @__PURE__ */ jsxs("div", { className: "px-2 py-4 flex flex-col bg-[#F2F2F2] border border-[#D7D7D7] rounded-2xl shadow overflow-hidden", children: [
        /* @__PURE__ */ jsxs("div", { className: "flex-shrink-0 px-4", children: [
          /* @__PURE__ */ jsxs("div", { className: "relative p-6 bg-[#91D6E5] rounded-2xl overflow-hidden", children: [
            /* @__PURE__ */ jsx("div", { className: "text-3xl font-bold text-sky-700", children: plan.display_name }),
            /* @__PURE__ */ jsxs("div", { className: "mt-6 flex items-center gap-4", children: [
              /* @__PURE__ */ jsx(UserIcon, { className: "h-8 text-sky-700" }),
              /* @__PURE__ */ jsxs("div", { className: "text-lg font-bold text-sky-700", children: [
                plan.nbr_user,
                " Users"
              ] })
            ] })
          ] }),
          /* @__PURE__ */ jsxs("div", { className: "py-8 flex items-center justify-between", children: [
            /* @__PURE__ */ jsxs("div", { className: "text-2xl font-semibold text-sky-700", children: [
              "$ ",
              plan.price
            ] }),
            /* @__PURE__ */ jsx("div", { className: "text-2xl font-semibold text-sky-700", children: plan.duration })
          ] })
        ] }),
        /* @__PURE__ */ jsx("div", { className: "flex-grow bg-white rounded-2xl overflow-hidden", children: /* @__PURE__ */ jsx("ul", { className: "px-6 py-8 list-disc space-y-2", children: plan.features.map((feature) => /* @__PURE__ */ jsx("li", { className: "text-lg", children: feature.display_name }, feature.id)) }) }),
        /* @__PURE__ */ jsx("div", { className: "flex-shrink-0 px-6 py-4 bg- rounded-b-2xl overflow-hidden", children: /* @__PURE__ */ jsx("button", { className: "w-full px-8 py-4 bg-[#D7D7D7] rounded-full text-[#2273AF] text-lg font-bold", children: "Get Started" }) })
      ] })) }),
      /* @__PURE__ */ jsx("div", { className: "hidden lg:block", children: /* @__PURE__ */ jsxs("div", { className: "my-10", children: [
        /* @__PURE__ */ jsxs("div", { className: "bg-slate-50 rounded border border-slate-200 justify-start items-start flex", children: [
          /* @__PURE__ */ jsxs("div", { className: "Title grow shrink basis-0 border-r border-slate-200 flex-col justify-start items-start inline-flex", children: [
            /* @__PURE__ */ jsx("div", { className: "Div self-stretch h-44 px-8 py-5 border-b border-slate-200 flex-col justify-center items-start gap-3 flex", children: /* @__PURE__ */ jsx("div", { className: "Frame30 self-stretch justify-start items-center gap-4 inline-flex", children: /* @__PURE__ */ jsx("div", { className: "ComparePlans text-sky-700 text-2xl font-bold font-['Tajawal']", children: "Compare plans" }) }) }),
            /* @__PURE__ */ jsx("div", { className: "Div self-stretch h-20 px-8 py-5 border-b border-slate-200 justify-start items-center gap-2.5 inline-flex", children: /* @__PURE__ */ jsx("div", { className: "Users grow shrink basis-0 text-sky-700 text-lg font-bold font-['Tajawal'] leading-relaxed", children: "Users" }) }),
            /* @__PURE__ */ jsx("div", { className: "self-stretch h-20 px-8 py-5 border-b border-slate-200 justify-start items-center gap-2.5 inline-flex", children: /* @__PURE__ */ jsx("div", { className: "grow shrink basis-0 text-sky-700 text-lg font-bold font-['Tajawal'] leading-relaxed", children: "Onboarding session" }) })
          ] }),
          filteredPlans && filteredPlans.map((plan) => /* @__PURE__ */ jsxs("div", { className: "Price01 grow shrink basis-0 border-r border-slate-200 flex-col justify-center items-center inline-flex", children: [
            /* @__PURE__ */ jsxs("div", { className: " self-stretch h-44 p-7 border-b border-slate-200 flex-col justify-center items-center gap-4 flex", children: [
              /* @__PURE__ */ jsx("div", { className: "text-sky-700 text-xl font-bold font-['Tajawal']", children: plan.display_name }),
              /* @__PURE__ */ jsxs("div", { className: "Frame28 justify-center items-end gap-2 inline-flex", children: [
                /* @__PURE__ */ jsx("div", { className: "Free text-sky-700 text-4xl font-bold font-['Tajawal']", children: plan.price }),
                /* @__PURE__ */ jsx("div", { className: "Frame29 py-1.5 justify-start items-end flex", children: /* @__PURE__ */ jsxs("div", { className: "Month text-gray-400 text-sm font-medium font-['Tajawal'] leading-tight", children: [
                  "/",
                  plan.duration
                ] }) })
              ] }),
              /* @__PURE__ */ jsx("div", { className: "Button self-stretch px-6 py-4 bg-sky-700 rounded justify-center items-center inline-flex", children: /* @__PURE__ */ jsx("div", { className: "ChooseThisPlan grow shrink basis-0 text-center text-slate-200 text-sm font-bold font-['Tajawal'] leading-tight", children: "Choose This Plan" }) })
            ] }),
            /* @__PURE__ */ jsx("div", { className: " self-stretch h-20 py-5 border-b border-slate-200 flex-col justify-center items-center gap-1 flex", children: /* @__PURE__ */ jsx("div", { className: " text-sky-700 text-sm font-medium font-['Tajawal'] leading-tight", children: "20 " }) }),
            /* @__PURE__ */ jsx("div", { className: " self-stretch h-20 py-5 border-b border-slate-200 flex-col justify-center items-center gap-1 flex", children: /* @__PURE__ */ jsx("div", { className: " text-sky-700 text-sm font-medium font-['Tajawal'] leading-tight", children: "4" }) })
          ] }))
        ] }),
        /* @__PURE__ */ jsxs("div", { className: "bg-slate-50 rounded border border-slate-200 justify-start items-start flex", children: [
          /* @__PURE__ */ jsx("div", { className: "Title grow shrink basis-0 border-r border-slate-200 flex-col justify-start items-start inline-flex", children: features && features.map((feature) => /* @__PURE__ */ jsx("div", { className: "self-stretch h-20 px-8 py-5 border-b border-slate-200 justify-start items-center gap-2.5 inline-flex", children: /* @__PURE__ */ jsx("div", { className: "grow shrink basis-0 text-sky-700 text-lg font-bold font-['Tajawal'] leading-relaxed", children: feature.display_name }) }, feature.id)) }),
          filteredPlans && filteredPlans.map((plan) => /* @__PURE__ */ jsx("div", { className: "Price01 grow shrink basis-0 border-r border-slate-200 flex-col justify-center items-center inline-flex", children: features && features.map((feature) => /* @__PURE__ */ jsx("div", { className: "self-stretch h-20 px-8 py-5 border-b border-slate-200 justify-center items-center gap-2.5 inline-flex", children: plan.features.filter((f) => f.id === feature.id).length > 0 && /* @__PURE__ */ jsx(CheckBadgeIcon, { className: "h-6 text-sky-700" }) }, feature.id)) }))
        ] })
      ] }) })
    ] })
  ] });
}
const Section = ({ children, className }) => {
  return /* @__PURE__ */ jsx("div", { className: `lg:min-h-screen h-full flex flex-col ${className}`, children: /* @__PURE__ */ jsx("div", { className: "mx-auto max-w-7xl w-full min-h-full", children }) });
};
export {
  Pricing as default
};
