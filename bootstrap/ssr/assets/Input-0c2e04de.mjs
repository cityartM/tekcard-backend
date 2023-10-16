import { jsx } from "react/jsx-runtime";
const InputLabel = ({ value, className = "", children, ...props }) => {
  return /* @__PURE__ */ jsx("label", { ...props, className: `capitalize text-[1.25rem] font-medium text-[#606060] ` + className, children: value ? value : children });
};
const TextArea = ({ className = "", rows = 3, children, ...props }) => {
  return /* @__PURE__ */ jsx(
    "textarea",
    {
      ...props,
      rows,
      className: "text-[1.25rem] border border-gray-300 rounded-2xl shadow-sm p-8 focus:outline-none focus:ring-1 focus:ring-[#2273AF] focus:border-[#2273AF]" + className,
      children
    }
  );
};
function InputError({ message, className = "", ...props }) {
  return message ? /* @__PURE__ */ jsx("p", { ...props, className: "text-sm text-red-600 " + className, children: message }) : null;
}
const TextInput = ({ type = "text", className = "", ...props }) => {
  return /* @__PURE__ */ jsx(
    "input",
    {
      ...props,
      type,
      className: "text-[1.25rem] px-8 py-4 border border-gray-300 rounded-2xl shadow-sm focus:outline-none focus:ring-1 focus:ring-[#2273AF] focus:border-[#2273AF] " + className
    }
  );
};
export {
  InputLabel as I,
  TextArea as T,
  InputError as a,
  TextInput as b
};
