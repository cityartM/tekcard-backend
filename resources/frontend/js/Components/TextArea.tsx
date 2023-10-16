import React, {TextareaHTMLAttributes} from "react";

const TextArea: React.FC<TextareaHTMLAttributes<HTMLTextAreaElement>> = ({className = '', rows = 3, children, ...props}) => {
  return (
    <textarea
      {...props}
      rows={rows}
      className={'text-[1.25rem] border border-gray-300 rounded-2xl shadow-sm p-8 focus:outline-none focus:ring-1 focus:ring-[#2273AF] focus:border-[#2273AF]' + className}
    >{children}</textarea>
  );
}

export default TextArea;
