import React, {LabelHTMLAttributes} from "react";

const InputLabel: React.FC<LabelHTMLAttributes<HTMLLabelElement> & { value?: string }> = ({ value, className = '', children, ...props } ) => {
  return (
    <label {...props} className={`capitalize text-[1.25rem] font-medium text-[#606060] ` + className}>
      {value ? value : children}
    </label>
  );
}

export default InputLabel;
