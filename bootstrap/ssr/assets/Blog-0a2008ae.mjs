import { jsxs, jsx } from "react/jsx-runtime";
import { usePage, Head } from "@inertiajs/react";
import { L as LandingLayout } from "./LandingLayout-26bef78b.mjs";
import "react";
import "@headlessui/react";
import "@heroicons/react/24/outline";
function Blog({}) {
  const props = usePage().props;
  const posts = props.posts.data;
  return /* @__PURE__ */ jsxs(LandingLayout, { children: [
    /* @__PURE__ */ jsx(Head, { title: "Welcome" }),
    /* @__PURE__ */ jsxs(Section, { children: [
      /* @__PURE__ */ jsx("div", { className: "mt-16 text-center text-7xl font-extrabold text-[#2273AF]", children: "Blog" }),
      /* @__PURE__ */ jsx(PostGrid, { posts })
    ] })
  ] });
}
const Section = ({ children, className }) => {
  return /* @__PURE__ */ jsx("div", { className: `min-h-screen h-full flex flex-col ${className}`, children: /* @__PURE__ */ jsx("div", { className: "flex-1 py-24 mx-auto max-w-7xl w-full min-h-full", children }) });
};
const BlogPostCard = ({ post }) => {
  return /* @__PURE__ */ jsxs("article", { className: "flex flex-col items-start justify-between", children: [
    /* @__PURE__ */ jsxs("div", { className: "relative w-full", children: [
      /* @__PURE__ */ jsx(
        "img",
        {
          src: post.thumbnail,
          alt: "",
          className: "aspect-[16/9] w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]"
        }
      ),
      /* @__PURE__ */ jsx("div", { className: "absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10" })
    ] }),
    /* @__PURE__ */ jsxs("div", { className: "max-w-xl", children: [
      /* @__PURE__ */ jsxs("div", { className: "mt-8 flex items-center gap-x-4 text-xs", children: [
        /* @__PURE__ */ jsx("time", { dateTime: post.datetime, className: "text-gray-500", children: post.date }),
        /* @__PURE__ */ jsx(
          "a",
          {
            href: post.category.href,
            className: "relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100",
            children: post.category.title
          }
        )
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "group relative", children: [
        /* @__PURE__ */ jsx("h3", { className: "mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600", children: /* @__PURE__ */ jsxs("a", { href: post.href, children: [
          /* @__PURE__ */ jsx("span", { className: "absolute inset-0" }),
          post.title
        ] }) }),
        /* @__PURE__ */ jsx("p", { className: "mt-5 line-clamp-3 text-sm leading-6 text-gray-600", children: post.description })
      ] })
    ] })
  ] }, post.id);
};
const PostGrid = ({ posts }) => {
  return /* @__PURE__ */ jsx("div", { className: "mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3", children: posts.map((post) => /* @__PURE__ */ jsx(BlogPostCard, { post }, post.id)) });
};
export {
  Blog as default
};
